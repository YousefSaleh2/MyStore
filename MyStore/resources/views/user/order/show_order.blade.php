

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price Per Item</th>
            <th>Price</th>

        </tr>
        @foreach ($order_items as $order_item)


        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $order_item->product->name }}</td>
            <td>{{ $order_item->quantity }}</td>
            <td>{{ $order_item->price_per_item }}</td>
            <td>{{ $order_item->price }}</td>
        </tr>

        @endforeach

    </table>
</div>


@endsection


