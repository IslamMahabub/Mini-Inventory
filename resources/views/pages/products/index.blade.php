@extends('layouts.app')
@section('title') Product @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product List
                        <a class="float-right" href="{{ route('products.create') }}"><button type="button" class="btn btn-info">Add New</button></a>
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
                                <th>Name</th>
                                <th>Product Code</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data as $key => $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
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
