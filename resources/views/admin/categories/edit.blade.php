@extends('layouts.admin')


@section('content')
    <h1>Edit Category</h1>
    {!! Form::model($category, ['method'=>'patch', 'action'=>['AdminCategoryController@update', $category->id]] ) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br>
    @include('includes.form_errors')
 
    
@endsection