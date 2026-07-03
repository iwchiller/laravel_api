<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Jobs\ProcessFetch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

#[Signature('app:fetch-api {folder=all}')]
#[Description('Запрашиваем данные соответствующего раздела API: sales, stocks, incomes, orders, all')]
class FetchApi extends Command
{
    private array $folders = ['all', 'sales', 'stocks', 'incomes', 'orders'];
    private string $folder = "";


    /**
     * @throws \Throwable
     */
    public function handle()
    {
        $this->folder = $this->argument("folder");
        if (!in_array($this->folder, $this->folders)) {
            $this->fail('Неправильный аргумент, ожидалось ' . implode(', ', $this->folders));
        }

        if ($this->folder === $this->folders[0]) {
            if (!$this->fetch_api_cycle()) {
                return 1;
            }
        } else {
            if (!$this->fetch_api($this->folder)) {
                return 2;
            }

        }
    }

    // Циклически запрашиваем все разделы API
    private function fetch_api_cycle(): bool {
        for ($folder_index = 1; $folder_index <= count($this->folders); $folder_index++) {
            if (!$this->fetch_api($this->folders[$folder_index])) {
                return false;
            }
        }
        return true;
    }
    private function fetch_api(string $folder_name): bool {
        echo "Fetching: {$folder_name}\n";
        $max_date = DB::table($folder_name)->max('date');
//        dd($max_date ?? date("Y-m-d", 0));
        $api = new ProcessFetch($folder_name, 1, $max_date, $_ENV['HTTP_API_PAGE_LIMIT']);
        $max_page = $api->get_max_page();
        if ($max_page <= 0) {
            $this->error("Fetching {$folder_name}: get_max_page error");
            return false;
        }

        Log::info("{$folder_name} max_page = {$max_page}");
        for ($page = 1; $page <= $max_page; $page++) {
            Log::info("{$folder_name} page = {$page}");
            $api->dispatch($folder_name, $page, $max_date, $_ENV['HTTP_API_PAGE_LIMIT']);
        }

        return true;
    }
}
