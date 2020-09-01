@extends('layouts.blog-home')

  <!-- Navigation -->
  @include('includes.front_nav')
    
  @section('content')
       
  <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Posts
            </h1>

            <!-- First Blog Post -->
            
            @if ($posts)
                @foreach ($posts as $post)
                <h2>
                    <a href="{{url("post/$post->slug")}}">{{$post->title}}</a>
                </h2>
                <p class="lead">
                     by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->format('d M Y h:m:s A')}}</p>
                <hr>
                    <img class="img-responsive" src="{{$post->photo? $post->photo->path : "images/no-image.jpg"}}" alt="">
                <hr>
                <p>{{Str::words($post->content, 15, '...')}}</p>
                 <a class="btn btn-primary" href="{{url("post/$post->slug")}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    
                <hr>
    
                @endforeach
            @endif
            
            <!-- Pagination -->
            <div class="several-pages">
                {{$posts->render()}}
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->

         @include('includes.front_sidebar');
              
        

    </div>
    <!-- /.row -->

    <hr>

  @endsection

