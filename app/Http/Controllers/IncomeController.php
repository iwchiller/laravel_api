<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFetch;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IncomeController extends Controller
{
    public function fetchInsert()
    {
        $incomes = new ProcessFetch("incomes", 1, $_ENV['HTTP_API_PAGE_LIMIT']);
        $max_page = $incomes->get_max_page();
        Log::info("incomes max page = {$max_page}");
        for ($page = 1; $page <= $max_page; $page++) {
            Log::info("incomes page = {$page}");
            ProcessFetch::dispatch("incomes", $page, $_ENV['HTTP_API_PAGE_LIMIT']);
        }
        return redirect()->route('incomes.index')->with('status', 'Incomes updated Successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::latest()->paginate(10);
        return view('incomes.index', compact('incomes'));
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
    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
