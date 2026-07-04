<?php

namespace App\Jobs;

use App\Models\Sale;
use App\Models\Order;
use App\Models\Income;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessFetch implements ShouldQueue
{
    use Queueable;

    // Сколько раз и через какие промежутки времени повторять запросы к API в случае ошибки
    private array $retry_delay_times = [1000, 2000, 3000];
    protected int $page_id = 1;
    protected int $records_limit;
    protected array $parameters;
    protected string $folder;
    public string $start_date;

    /**
     * Create a new job instance.
     */
    public function __construct($folder = "sales", $page_id = 1, $start_date = null, $records_limit = 500)
    {
        $this->folder = $folder;
        $this->page_id = $page_id;
        $this->records_limit = $records_limit;
        $this->start_date =  $start_date ?? date("Y-m-d", 0);
        $this->parameters = $this->create_parameters($this->page_id);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Log::alert("parameters = " . json_encode($this->parameters));
        for ($n = 0; $n < 3; $n++) {
            $response = Http::get($_ENV['HTTP_API_URL'] . $this->folder, $this->parameters);

            if ($response->ok()) {
                break;
            } elseif ($response->tooManyRequests()) {
                $response_header = $response->headers();
                $sleep_seconds_str = array_first($response_header["Retry-After"]);
                $sleep_seconds = intval($sleep_seconds_str);
                Log::alert("Страница {$this->page_id}: '429 Too Many Requests' ожидаем {$sleep_seconds_str} секунд");
                sleep($sleep_seconds + 1);
            } else {
                sleep(5);
            }
        }
        $records = $response->json('data');
        switch ($this->folder) {
            case "sales":
                Sale::upsert($records, uniqueBy: ['g_number', 'sale_id']);
                break;
            case "orders":
                Order::upsert($records, uniqueBy: ['g_number']);
                break;
            case "incomes":
                Income::upsert($records, uniqueBy: ['income_id', 'supplier_article']);
                break;
            case "stocks":
                Stock::upsert($records, uniqueBy: ['supplier_article', 'barcode', 'is_supply', 'warehouse_name']);
                break;
            default: break;
        }
    }

    private function create_parameters($page_id): array
    {
        return [
            "dateFrom" => ($this->folder === "stocks" ? date("Y-m-d") : $this->start_date),
            "dateTo" => date("Y-m-d"),
            "page" => $page_id,
            "key" => $_ENV['HTTP_API_KEY'],
            "limit" => $this->records_limit
        ];
    }

    public function get_max_page(): int
    {
        $response = Http::retry($this->retry_delay_times)->get($_ENV['HTTP_API_URL'] . $this->folder, $this->parameters);
        if (!$response->ok()) {
            return -1;
        }
        $meta = $response->json("meta");
        if (is_null($meta)) {
            return -1;
        }

        return (int)($meta["last_page"] ?? "-1");
    }
}
