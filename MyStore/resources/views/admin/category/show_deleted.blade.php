@extends('layouts.master')
@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Categories Deleted</h2>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('category_restore',$category->id) }}">Restore</a>
                <a class="btn btn-danger" href="{{ route('category_force_deleted',$category->id) }}">Force Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
</div>


@endsection
@section('js')
@endsection
