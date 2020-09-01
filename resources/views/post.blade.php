@extends('layouts.blog-post')

@section('content')
                
                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                   By {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('d M Y - h:i:s A')}}</p>

                <hr>

                <!-- Preview Image -->
                    @if ($post->photo)
                    <img class="img-responsive" style="height: 400px; width: 100%" 
                    src="{{$post->photo? url($post->photo->path) : url('images/no-image.jpg')}}" alt="">
                    <hr>
                    @endif
                

                <!-- Post Content -->
                
                <p>{{$post->content}}</p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if (Auth::check())
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        
                        {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store']) !!}
                            <div class="form-group">
                                {!! Form::hidden('post_id', $post->id) !!}
                                {!! Form::textarea('content', null, ['rows'=>'3', 'class'=>'form-control']) !!}
                            </div>
                            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                @endif

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @if ($comments)
                    <?php $id = 1; ?>
                    @foreach ($comments as $comment)
                    <div class="media" id="comment{{$id}}">
                        <a class="pull-left" href="#">
                            <?php if($comment->photo) { ?>
                                <img class="media-object" width="60" src="{{url("$comment->photo")}}" alt="">
                            <?php } else if(Gravatar::exists($comment->email)) { ?>
                                <img class="img-responsive" src="{{Gravatar::get($comment->email)}}" alt="">
                            <?php } else { ?>
                                <img class="media-object" width="60" src="{{url('images/empty-avatar.png')}}" alt="">
                            <?php } ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->format('d M Y - h:i:s A')}}</small>
                            </h4>
                            <p>{{$comment->content}}</p>
                            @if(Auth::check())
                            
                            <button class="btn btn-info reply-btn" id={{$id}}>Reply</button>
                            @endif
                              <!--Reply-->
                            <div class="nested-comments media">
                                
                                @if($comment->replies)
                                @foreach ($comment->replies as $reply)
                                @if($reply->is_active)
                                <a class="pull-left" href="#">
                                    
                                    <img width='60' class="media-object" src="{{$reply->photo? url($reply->photo) : 
                                    url('images/no-image.jpg')}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->Author}}
                                        <small>{{$reply->created_at->format('d M Y - h:i:s A')}}</small>
                                    </h4>
                                    <p>{{$reply->content}}</p>
                                    <!-- Nested Comment -->
                                    
                                    <!-- End Nested Comment -->
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            @if (Auth::check())
                                <div class="well reply-form">
                                    <h4>Reply:</h4>
                                    {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@store']) !!}
                                        <div class="form-group">
                                            {!! Form::hidden('comment_id', $comment->id) !!}
                                            {!! Form::textarea('content', null, ['rows'=>'3', 'class'=>'form-control']) !!}
                                        </div>
                                        {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                    {!! Form::close() !!} 
                                </div>
                            @endif
                        </div>
                    </div>
                    <?php $id++ ?> 
                    @endforeach
                @endif               
@endsection

@section('footer')
    <script id="dsq-count-scr" src="//codehacking-bypwcu3zav.disqus.com/count.js" async></script>
@endsection