<?php

use App\Models\Sale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sales', SaleController::class);
Route::resource('orders', OrderController::class);
Route::resource('incomes', IncomeController::class);
Route::resource('stocks', StockController::class);

Route::get('/api/orders', function () {
    return \App\Models\Order::where('id', 34)->get();
});
