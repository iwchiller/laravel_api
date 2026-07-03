@extends('layouts.app')

@section('title', $title ?? 'API Incomes')

@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <a href="{{ route('sales.index') }}" class="btn btn-secondary me-3">Sales</a>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary me-3">Orders</a>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary me-3">Stocks</a>
    </div>
    <div class="d-flex justify-content-left align-items-center mb-3">
        <a href="{{ route('incomes_fetch') }}" class="btn btn-primary mr-5">Fetch Incomes from API</a>
    </div>
    @if($incomes->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Barcode</th>
                    <th>Quantity</th>
                    <th>Total_price</th>
                    <th>Warehouse_name</th>
                    <th>Full Info</th>
                </tr>
                </thead>
                <tbody>
                @foreach($incomes as $income)
                    <tr>
                        <td>{{ $income->id }}</td>
                        <td>{{ $income->number }}</td>
                        <td>{{ $income->date }}</td>
                        <td>{{ $income->barcode }}</td>
                        <td>{{ $income->quantity }}</td>
                        <td>{{ $income->total_price }}</td>
                        <td>{{ $income->warehouse_name }}</td>
                        <td align="center">
                            <a href="{{ route('incomes.show', $income->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32" height="32" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
                            <path d="M408,0H51C22.95,0,0,22.95,0,51v357c0,28.05,22.95,51,51,51h357c28.05,0,51-22.95,51-51V51C459,22.95,436.05,0,408,0z M153,357h-51v-51h51V357z M153,255h-51v-51h51V255z M153,153h-51v-51h51V153z M357,357H178.5v-51H357V357z M357,255H178.5v-51 H357V255z M357,153H178.5v-51H357V153z"/>
                            </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $incomes->links() }}
    @endif

@endsection
