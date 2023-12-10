@extends('layouts.master')
@section('css')
@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Users</h2>
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
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('users_update', $user->id) }}">Change access</a>
                <a class="btn btn-info" href="{{ route('filter_orders', $user->id) }}">Show Orders</a>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $users->links() }}
</div>
</div>

@endsection
@section('js')
@endsection
