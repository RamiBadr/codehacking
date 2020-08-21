@extends('layouts.admin')

@section('content')

        <section id='posts'>
            <h1>Posts</h1>
            @if ($posts)
            @foreach ($posts as $post)
            <div class="post">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="photo-side">
                          <img  class='img-responsive img-post' src="{{$post->photo? url($post->photo->path) : url('images/no-image.jpg')}}" 
                          alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2 class="post-title"><strong>Title:</strong> {{$post->title}}</h2>
                        <p class='post-id'><strong>Id:</strong> {{$post->id}}</p>
                        <p class="post-category"><strong>Category:</strong> {{$post->category? $post->category->name : ''}}</p>
                        <p class='post-content'><strong>Content:</strong> {{Str::words($post->content, 20)}}</p>
                        <p class="post-created"><strong>Created:</strong> {{$post->created_at->diffForHumans()}}</p>
                        <p class='post-update'><Strong>Last Update:</Strong> {{$post->updated_at->diffForHumans()}}</p>
                        <p class="post-author"><strong>Author:</strong> {{$post->user? $post->user->name : ''}}</p>
                        <a href="{{url("admin/posts/$post->id/edit")}}" class="btn btn-primary">Edit</a>
                        {!! Form::open(['method'=>'delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @endif
            
        </section>
  
   
    
@endsection