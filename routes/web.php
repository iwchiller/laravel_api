<?php

use App\Models\Sale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\StockController;

Route::get('/', function () {

    $sales = Sale::latest()->paginate(10);

    return view('sales.index', compact('sales'));

//    return view('welcome');
});

Route::get('sales/fetch', [SaleController::class, 'fetchInsert'])->name('sales_fetch');
Route::get('orders/fetch', [OrderController::class, 'fetchInsert'])->name('orders_fetch');
Route::get('incomes/fetch', [IncomeController::class, 'fetchInsert'])->name('incomes_fetch');
Route::get('stocks/fetch', [StockController::class, 'fetchInsert'])->name('stocks_fetch');

Route::resource('sales', SaleController::class);
Route::resource('orders', OrderController::class);
Route::resource('incomes', IncomeController::class);
Route::resource('stocks', StockController::class);

Route::get('/api/orders', function () {
    return \App\Models\Order::where('id', 34)->get();
});
