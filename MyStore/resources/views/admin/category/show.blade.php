@extends('layouts.master')
@section('css')
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Category</h2>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('categories.index') }}" class=" btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->name }}
                <hr>
                @foreach ($products as $product)
                @if ( $product->category->id == $category->id)
                <strong>Product Name :   </strong>
                {{ $product->name }} <br>
                <strong>Product Price :   </strong>
                {{ $product->price }} <br>
                <strong>Product Description :   </strong>
                {{ $product->description }} <hr>
                @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
