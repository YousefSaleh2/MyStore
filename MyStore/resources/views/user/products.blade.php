@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Products</h2>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @foreach ($products as $product)
                <p><strong> Name : </strong>
                    {{ $product->name }}</p> <br>
                <p><strong> Price : </strong>
                    {{ $product->price }}</p> <br>
                <p><strong> Category : </strong>
                    {{ $product->category->name }}</p> <br>
                <p><strong> Description : </strong>
                    {{ $product->description }} </p><br>
                <hr>
            @endforeach
            {{ $products->links() }}
        </div>
    @endsection
