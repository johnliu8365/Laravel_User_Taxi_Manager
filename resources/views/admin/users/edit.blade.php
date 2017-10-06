@extends('layouts.admin')

@section('content')

    <h1>Edit Users</h1>

    <div class="col-sm-9">
        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id]]) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', $user->email, ['class'=>'form-control', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
        
        <div class="form-group">
            {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}
        </div>
        
        {!! Form::close() !!}

        @include('includes.form_error')
    </div>

@stop