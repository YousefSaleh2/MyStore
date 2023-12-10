@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Products Deleted</h2>
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
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('product_restore',$product->id) }}">Restore</a>
                <a class="btn btn-danger" href="{{ route('product_force_deleted',$product->id) }}">Force Delete</a>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection
@section('js')
@endsection
