@extends('layouts.app')

@section('title', $title ?? 'API Income Info')

@section('content')
    <div class="d-flex justify-content-left align-items-center mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-primary mr-5"><<< Back</a>
    </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $income->id }}</td>
                    </tr>
                    <tr>
                        <td>income_id</td>
                        <td>{{ $income->income_id }}</td>
                    </tr>
                    <tr>
                        <td>number</td>
                        <td>{{ $income->number }}</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td>{{ $income->date }}</td>
                    </tr>
                    <tr>
                        <td>last_change_date</td>
                        <td>{{ $income->last_change_date }}</td>
                    </tr>
                    <tr>
                        <td>supplier_article</td>
                        <td>{{ $income->supplier_article }}</td>
                    </tr>
                    <tr>
                        <td>tech_size</td>
                        <td>{{ $income->tech_size }}</td>
                    </tr>
                    <tr>
                        <td>barcode</td>
                        <td>{{ $income->barcode }}</td>
                    </tr>
                    <tr>
                        <td>quantity</td>
                        <td>{{ $income->quantity }}</td>
                    </tr>
                    <tr>
                        <td>total_price</td>
                        <td>{{ $income->total_price }}</td>
                    </tr>
                    <tr>
                        <td>date_close</td>
                        <td>{{ $income->date_close }}</td>
                    </tr>
                    <tr>
                        <td>warehouse_name</td>
                        <td>{{ $income->warehouse_name }}</td>
                    </tr>
                    <tr>
                        <td>nm_id</td>
                        <td>{{ $income->nm_id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection

