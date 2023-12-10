@extends('layouts.master')
@section('css')
@endsection

@section('content')
				<!-- row -->
				<div class="row">
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
                                <th>User Name</th>
                                <th>Statue</th>
                                <th>Total Price</th>

                                <th width="280px">Action</th>

                            </tr>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->statue }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <a href="{{ route('order_items' , $order->id) }}" class="btn btn-info">Show Order</a>
                                    <form action="{{ route('reject_order' , $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                    <form action="{{ route('accepte_order' , $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Accepte</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>


				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
