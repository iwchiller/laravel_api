<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFetch;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function fetchInsert()
    {
        $sales = new ProcessFetch("sales", 1, $_ENV['HTTP_API_PAGE_LIMIT']);
        $max_page = $sales->get_max_page();
        Log::info("sale max page = {$max_page}");
        for ($page = 1; $page <= $max_page; $page++) {
            Log::info("sale page = {$page}");
            ProcessFetch::dispatch("sales", $page, $_ENV['HTTP_API_PAGE_LIMIT']);
        }

        return redirect()->route('sales.index')->with('status', 'Sales updated Successfully!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::latest()->paginate(10);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
