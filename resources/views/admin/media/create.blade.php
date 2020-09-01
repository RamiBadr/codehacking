
@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css">
@endsection

 {{-- dropzone --}}
<link rel="stylesheet" href="">

@section('content')
    <h1>Upload Photos</h1>

    {!! Form::open(['method'=>'post', 'action'=>'AdminMediaController@store', 
    'class'=>'dropzone', 
    'id'=>"my-awesome-dropzone",
    'width'=>'500']) !!}
        {{-- <div class="form-group">
            {!! Form::label($for, $text, [$options]) !!}
            {!! Form::text($name, $value, [$options]) !!}
        </div>
        {!! Form::submit'(Upload', ['class' => 'btn btn-primary']) !!} --}}
    {!! Form::close() !!}
@endsection

@section('footer')
    {{-- dropzone --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js'></script>

@endsection