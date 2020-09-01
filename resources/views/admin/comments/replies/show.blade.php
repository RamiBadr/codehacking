@extends('layouts/admin')

@section('content')

@if (count($replies) > 0) 
<h1>replies</h1>
<table class='table'>
            <thead>
              <tr>
                <th scope='col'>Id</th>
                <th scope='col'>author</th>
                <th scope='col'>Content</th>
                <th scope='col'>Created At</th>
              </tr>
            </thead>
            <tbody>
          
               @foreach ($replies as $reply)
               <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->content}}</td>
                <td>{{$reply->created_at->diffForHumans()}}</td>
                <td>
                    <div class="row">
                        <div class='col-sm-3'>
                            <a class='btn btn-success' href="{{url('post/' . $reply->comment->post_id)}}">View Post</a>
                        </div>
                        <div class='col-sm-3'>
                            <a class='btn btn-info' href="{{route('comments.index')}}">View Comments</a>
                        </div>
                        {!! Form::open(['method' => 'patch', 'action'=>['CommentRepliesController@update', $reply->id], 'class'=>'col-sm-3']) !!}
                        {!! Form::submit($reply->is_active == 0? "Approve" : 'Unapprove', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                
                        {!! Form::open(['method' => 'delete', 'action'=>['CommentRepliesController@destroy', $reply->id], 'class'=>'col-sm-3']) !!}
                                {!! Form::submit('Delete', ["class" => "btn btn-danger"]) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
              </tr>
               @endforeach
           
            
    </tbody>
</table>
@else 
<h1 class="text-center">No Replies</h1>
@endif 
@endsection
