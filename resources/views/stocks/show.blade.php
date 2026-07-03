@extends('layouts.app')

@section('title', $title ?? 'API Stock Info')

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
                        <td>{{ $stock->id }}</td>
                    </tr>
                    <tr>
                        <td>date</td>
                        <td>{{ $stock->date }}</td>
                    </tr>
                    <tr>
                        <td>last_change_date</td>
                        <td>{{ $stock->last_change_date }}</td>
                    </tr>
                    <tr>
                        <td>supplier_article</td>
                        <td>{{ $stock->supplier_article }}</td>
                    </tr>
                    <tr>
                        <td>tech_size</td>
                        <td>{{ $stock->tech_size }}</td>
                    </tr>
                    <tr>
                        <td>barcode</td>
                        <td>{{ $stock->barcode }}</td>
                    </tr>
                    <tr>
                        <td>quantity</td>
                        <td>{{ $stock->quantity }}</td>
                    </tr>
                    <tr>
                        <td>is_supply</td>
                        <td>{{ $stock->is_supply }}</td>
                    </tr>
                    <tr>
                        <td>is_realization</td>
                        <td>{{ $stock->is_realization }}</td>
                    </tr>
                    <tr>
                        <td>quantity_full</td>
                        <td>{{ $stock->quantity_full }}</td>
                    </tr>
                    <tr>
                        <td>warehouse_name</td>
                        <td>{{ $stock->warehouse_name }}</td>
                    </tr>
                    <tr>
                        <td>in_way_to_client</td>
                        <td>{{ $stock->in_way_to_client }}</td>
                    </tr>
                    <tr>
                        <td>in_way_from_client</td>
                        <td>{{ $stock->in_way_from_client }}</td>
                    </tr>
                    <tr>
                        <td>nm_id</td>
                        <td>{{ $stock->nm_id }}</td>
                    </tr>
                    <tr>
                        <td>subject</td>
                        <td>{{ $stock->subject }}</td>
                    </tr>
                    <tr>
                        <td>category</td>
                        <td>{{ $stock->category }}</td>
                    </tr>
                    <tr>
                        <td>brand</td>
                        <td>{{ $stock->brand }}</td>
                    </tr>
                    <tr>
                        <td>sc_code</td>
                        <td>{{ $stock->sc_code }}</td>
                    </tr>
                    <tr>
                        <td>price</td>
                        <td>{{ $stock->price }}</td>
                    </tr>
                    <tr>
                        <td>discount</td>
                        <td>{{ $stock->discount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection

