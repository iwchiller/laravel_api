@extends('layouts.app')

@section('title', $title ?? 'API Sale Info')

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
                        <td>{{ $sale->id }}</td>
                    </tr>
                    <tr>
                        <td>g_number</td>
                        <td>{{ $sale->g_number }}</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td>{{ $sale->date }}</td>
                    </tr>
                    <tr>
                        <td>last_change_date</td>
                        <td>{{ $sale->last_change_date }}</td>
                    </tr>
                    <tr>
                        <td>supplier_article</td>
                        <td>{{ $sale->supplier_article }}</td>
                    </tr>
                    <tr>
                        <td>tech_size</td>
                        <td>{{ $sale->tech_size }}</td>
                    </tr>
                    <tr>
                        <td>barcode</td>
                        <td>{{ $sale->barcode }}</td>
                    </tr>
                    <tr>
                        <td>total_price</td>
                        <td>{{ $sale->total_price }}</td>
                    </tr>
                    <tr>
                        <td>discount_percent</td>
                        <td>{{ $sale->discount_percent }}</td>
                    </tr>
                    <tr>
                        <td>is_supply</td>
                        <td>{{ $sale->is_supply }}</td>
                    </tr>
                    <tr>
                        <td>is_realization</td>
                        <td>{{ $sale->is_realization }}</td>
                    </tr>
                    <tr>
                        <td>promo_code_discount</td>
                        <td>{{ $sale->promo_code_discount }}</td>
                    </tr>
                    <tr>
                        <td>warehouse_name</td>
                        <td>{{ $sale->warehouse_name }}</td>
                    </tr>
                    <tr>
                        <td>country_name</td>
                        <td>{{ $sale->country_name }}</td>
                    </tr>
                    <tr>
                        <td>oblast_okrug_name</td>
                        <td>{{ $sale->oblast_okrug_name }}</td>
                    </tr>
                    <tr>
                        <td>region_name</td>
                        <td>{{ $sale->region_name }}</td>
                    </tr>
                    <tr>
                        <td>income_id</td>
                        <td>{{ $sale->income_id }}</td>
                    </tr>
                    <tr>
                        <td>sale_id</td>
                        <td>{{ $sale->sale_id }}</td>
                    </tr>
                    <tr>
                        <td>odid</td>
                        <td>{{ $sale->odid }}</td>
                    </tr>
                    <tr>
                        <td>spp</td>
                        <td>{{ $sale->spp }}</td>
                    </tr>
                    <tr>
                        <td>for_pay</td>
                        <td>{{ $sale->for_pay }}</td>
                    </tr>
                    <tr>
                        <td>finished_price</td>
                        <td>{{ $sale->finished_price }}</td>
                    </tr>
                    <tr>
                        <td>price_with_disc</td>
                        <td>{{ $sale->price_with_disc }}</td>
                    </tr>
                    <tr>
                        <td>nm_id</td>
                        <td>{{ $sale->nm_id }}</td>
                    </tr>
                    <tr>
                        <td>subject</td>
                        <td>{{ $sale->subject }}</td>
                    </tr>
                    <tr>
                        <td>category</td>
                        <td>{{ $sale->category }}</td>
                    </tr>
                    <tr>
                        <td>brand</td>
                        <td>{{ $sale->brand }}</td>
                    </tr>
                    <tr>
                        <td>is_storno</td>
                        <td>{{ $sale->is_storno }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection

