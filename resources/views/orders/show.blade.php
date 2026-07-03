@extends('layouts.app')

@section('title', $title ?? 'API Order Info')

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
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <td>g_number</td>
                        <td>{{ $order->g_number }}</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td>{{ $order->date }}</td>
                    </tr>
                    <tr>
                        <td>last_change_date</td>
                        <td>{{ $order->last_change_date }}</td>
                    </tr>
                    <tr>
                        <td>supplier_article</td>
                        <td>{{ $order->supplier_article }}</td>
                    </tr>
                    <tr>
                        <td>tech_size</td>
                        <td>{{ $order->tech_size }}</td>
                    </tr>
                    <tr>
                        <td>barcode</td>
                        <td>{{ $order->barcode }}</td>
                    </tr>
                    <tr>
                        <td>total_price</td>
                        <td>{{ $order->total_price }}</td>
                    </tr>
                    <tr>
                        <td>discount_percent</td>
                        <td>{{ $order->discount_percent }}</td>
                    </tr>
                    <tr>
                        <td>warehouse_name</td>
                        <td>{{ $order->warehouse_name }}</td>
                    </tr>
                    <tr>
                        <td>oblast</td>
                        <td>{{ $order->oblast }}</td>
                    </tr>
                    <tr>
                        <td>income_id</td>
                        <td>{{ $order->income_id }}</td>
                    </tr>
                    <tr>
                        <td>odid</td>
                        <td>{{ $order->odid }}</td>
                    </tr>
                    <tr>
                        <td>nm_id</td>
                        <td>{{ $order->nm_id }}</td>
                    </tr>
                    <tr>
                        <td>subject</td>
                        <td>{{ $order->subject }}</td>
                    </tr>
                    <tr>
                        <td>category</td>
                        <td>{{ $order->category }}</td>
                    </tr>
                    <tr>
                        <td>brand</td>
                        <td>{{ $order->brand }}</td>
                    </tr>
                    <tr>
                        <td>is_cancel</td>
                        <td>{{ $order->is_cancel }}</td>
                    </tr>
                    <tr>
                        <td>cancel_dt</td>
                        <td>{{ $order->cancel_dt }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection

