<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFetch;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StockController extends Controller
{
    public function fetchInsert()
    {
        $stocks = new ProcessFetch("stocks", 1, $_ENV['HTTP_API_PAGE_LIMIT']);
        $max_page = $stocks->get_max_page();
        Log::info("stocks max page = {$max_page}");
        for ($page = 1; $page <= $max_page; $page++) {
            Log::info("stocks page = {$page}");
            ProcessFetch::dispatch("stocks", $page, $_ENV['HTTP_API_PAGE_LIMIT']);
        }
        return redirect()->route('stocks.index')->with('status', 'Stocks updated Successfully!');

    }    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::latest()->paginate(10);
        return view('stocks.index', compact('stocks'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
