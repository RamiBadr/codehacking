@extends('layouts.admin')

@section('content')
    <h1 class='page-title'>Edit User</h1>
    
    <div class="col-sm-3">
     <img class='img-rounded img-responsive img-edit'  src="{{$user->photos? url($user->photos->path) : url('images/empty-avatar.png')}}" alt="">
    </div>
    <div class="col-sm-9">
    {!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'patch', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', "Name") !!}
            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', "Email") !!}
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'active') !!}
            {!! Form::checkbox('is_active', true, null, ['id' => 'status']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Roles') !!}
            {!! Form::select('role_id', $roles, null, ['id'=>'roles', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Upload Photo') !!} <br>
            {!! Form::file('photo', ['id' => 'photo']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', "Password") !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    </div>

    <div class="col-sm-12">
        @include('includes.form_errors')
    </div>
   
@endsection

@section('footer')
    
@endsection