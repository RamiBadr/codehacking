@extends('layouts/admin')

@section('content')

@if ($comments) 
<h1>Comments</h1>
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
          
               @foreach ($comments as $comment)
               <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    <div class="row">
                        <div class='col-sm-4'>
                            <a class='btn btn-success' href="{{url("post/$comment->post_id")}}">View Post</a>
                        </div>
                        {!! Form::open(['method' => 'patch', 'action'=>['PostCommentsController@update', $comment->id], 'class'=>'col-sm-4']) !!}
                        {!! Form::submit($comment->is_active == 0? "Approve" : 'Unapprove', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                
                        {!! Form::open(['method' => 'delete', 'action'=>['PostCommentsController@destroy', $comment->id], 'class'=>'col-sm-4']) !!}
                                {!! Form::submit('Delete', ["class" => "btn btn-danger"]) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
              </tr>
               @endforeach
           
            
    </tbody>
</table>
@else 
<h1 class="text-center">{{'No Comments'}}</h1>
@endif 
@endsection
