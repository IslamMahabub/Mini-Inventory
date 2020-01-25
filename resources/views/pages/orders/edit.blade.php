@extends('layouts.app')
@section('title') Order @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Order
                        <a class="float-right" href="{{ route('orders.index') }}"><button type="button" class="btn btn-info">Order List</button></a>
                    </div>

                    <div class="card-body">
                        {!! Form::model($order, ['method' => 'PATCH','route' => ['orders.update', $order->id]]) !!}
                        <div class="card-body card-block">
                            <div class="card-body card-block">
                                <div class="row form-group" @if($user_type != 'admin') hidden @endif>>
                                    <div class="col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Supplier</label>
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::select('supplier_id', $suppliers, $order->supplier_id, array('class' => 'form-control')) !!}
                                        @error('supplier_id')
                                        <span class="help-block text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Product</label>
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::select('product_id', $products, $order->product_id, array('class' => 'form-control')) !!}
                                        @error('product_id')
                                        <span class="help-block text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label for="textarea-input" class=" form-control-label">Quantity</label>
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::hidden('order_date', $order->order_date, array('placeholder' => 'Order Date','class' => 'form-control')) !!}
                                        {!! Form::text('quantity', null, array('placeholder' => 'Quantity','class' => 'form-control')) !!}
                                        @error('quantity')
                                        <span class="help-block text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
