@extends('layouts.app')
@section('title') Order @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Order List
                        <a class="float-right" href="{{ route('orders.create') }}"><button type="button" class="btn btn-info">Add New</button></a>
                    </div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Supplier</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data as $key => $order)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->supplier->name }}</td>
                                    <td>{{ $order->product->product_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
