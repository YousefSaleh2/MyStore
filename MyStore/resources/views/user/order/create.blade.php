@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New order</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('orders_store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="product_ids[]" class="form-select" aria-label="Default select example">
                        <option selected>Open this select product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantities[]" class="form-control" placeholder="quantity">
                </div>
                <br><hr><br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="product_ids[]" class="form-select" aria-label="Default select example">
                        <option selected>Open this select product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantities[]" class="form-control" placeholder="quantity">
                </div>
                </div>
                <br><hr><br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="product_ids[]" class="form-select" aria-label="Default select example">
                        <option selected>Open this select product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantities[]" class="form-control" placeholder="quantity">
                </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
</div>
@endsection

