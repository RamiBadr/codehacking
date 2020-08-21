@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    {{-- <form method="POST" action="">
            <div class="form-group">
                <label for="name">Password</label>
                <input type="name" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
            <div class="form-group">
                <label for="roles">Example multiple select</label>
                <select class="form-control" id="roles">
                  @if ($roles)
                      @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}

    {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'post', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', "Name") !!}
            {!! Form::text('name', null, ['id' => 'name', 'placeholder' => 'Name', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', "Email") !!}
            {!! Form::email('email', null, ['id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'active') !!}
            {!! Form::checkbox('status', true, null, ['id' => 'status']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Roles') !!}
            {!! Form::select('role_id', ['' => 'Choose Role'] + $roles, null, ['id'=>'roles', 'class' => 'form-control']) !!}
    
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Upload Photo') !!}
            {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', "Password") !!}
            {!! Form::password('password', ['id' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create', ['name' => 'create', 'class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.form_errors')
    
@endsection

@section('footer')
    
@endsection