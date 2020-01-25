@extends('layouts.app')
@section('title') Product @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Product
                        <a class="float-right" href="{{ route('products.index') }}"><button type="button" class="btn btn-info">Product List</button></a>
                    </div>

                    <div class="card-body">
                        {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id]]) !!}
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('product_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Product Code</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('product_code', null, array('placeholder' => 'Product Code','class' => 'form-control')) !!}
                                    @error('product_code')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Price</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                                    @error('price')
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
