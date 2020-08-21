@extends('layouts.admin')

@section('content')
    <h1>Create Posts</h1>
    {!! Form::open(['action' => 'AdminPostsController@store', 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', "Title") !!}
        {!! Form::text('title', null, ['id' => 'title', 'placeholder' => 'title', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', "Content") !!}
        {!! Form::textarea('content', null, ['placeholder' => 'content', 'class' => 'form-control', 'rows' => '5']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Upload Photo') !!}
        {!! Form::file('photo_id', ['id' => 'photo', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', ['' => 'Choose Category'] + $categories, null, ['id'=>'roles', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create', ['name' => 'create', 'class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

@include('includes.form_errors')

@endsection