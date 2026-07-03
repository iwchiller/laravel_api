<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFetch;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function fetchInsert()
    {
        $orders = new ProcessFetch("orders", 1, $_ENV['HTTP_API_PAGE_LIMIT']);
        $max_page = $orders->get_max_page();
        Log::info("order max page = {$max_page}");
        for ($page = 1; $page <= $max_page; $page++) {
            Log::info("order page = {$page}");
            ProcessFetch::dispatch("orders", $page, $_ENV['HTTP_API_PAGE_LIMIT']);
        }

        return redirect()->route('orders.index')->with('status', 'Orders  updated Successfully!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view('orders.index', compact('orders'));

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
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
