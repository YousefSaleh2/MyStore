

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
            <th>Statue</th>
            <th>Total Price</th>

            <th width="280px">Action</th>

        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $order->statue }}</td>
            <td>{{ $order->total_price }}</td>
            <td>
                <a href="{{ route('order_items' , $order->id) }}" class="btn btn-info">Show Order</a>
            </td>
        </tr>
        @endforeach

    </table>
</div>


@endsection


