@extends('layouts.app')
@section('title') User @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit User
                        <a class="float-right" href="{{ route('users.index') }}"><button type="button" class="btn btn-info">User List</button></a>
                    </div>

                    <div class="card-body">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">User Type</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::select('user_type', ['admin' => 'Admin', 'supplier' => 'Supplier'], $user->supplier_id, ['placeholder' => 'Select User Type...', 'class' => 'form-control']); !!}
                                    @error('user_type')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    @error('name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    @error('email')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    @error('password')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Confirm Password</label>
                                </div>
                                <div class="col-md-10">
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                    @error('confirm-password')
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
