@extends('layouts.admin')

@section('content')
<div class="col-sm-3">
   <img class='img-rounded img-responsive img-edit'  src="{{$post->photo? url($post->photo->path) : url('images/no-image.jpg')}}" alt="">
</div>
<div class="col-sm-9">
    <h1>Edit Post</h1>
    {!! Form::model($post, ['action' => ['AdminPostsController@update', $post->id], 'method' => 'patch', 'files' => true]) !!}
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
        {!! Form::select('category_id', $categories, null, ['id'=>'roles', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['name' => 'Edit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>

{!! Form::close() !!}
<div class="col-sm-12">
    @include('includes.form_errors')
</div>

@endsection