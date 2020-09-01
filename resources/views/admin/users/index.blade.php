@extends('layouts.admin');
   
@section('content')
  @include('includes.flash_messages')  
 <table class='table table-hover'>
  <section id='posts'>
    <h1>Users</h1>
    @if ($users)
    @foreach ($users as $user)
    <div class="user">
        <div class="row">
            <div class="col-sm-3">
                <div class="photo-side">
                    <?php if($user->photos) { ?>
                        <img class="img-responsive" src="{{url($user->photos->path)}}" alt="">
                    <?php } else if(Gravatar::exists($user->email)) { ?>
                        <img class="img-responsive" src="{{Gravatar::get($user->email)}}" alt="">
                    <?php } else { ?>
                        <img class="img-responsive" src="{{url('images/empty-avatar.png')}}" alt="">
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="post-title"><strong>Name:</strong> {{$user->name}}</h2>
                <p class='post-id'><strong>Id:</strong> {{$user->id}}</p>
                <p class="post-created"><strong>Created:</strong> {{$user->created_at->diffForHumans()}}</p>
                <p class='post-update'><Strong>Last Update:</Strong> {{$user->updated_at->diffForHumans()}}</p>
                <a href={{url("admin/users/$user->id/edit")}} class="btn btn-primary">Edit</a>
                {!! Form::open(['method' => 'Delete', 'action' =>['AdminUsersController@destroy', $user->id], 'class' => 'del-btn']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <hr>
    @endforeach
    @endif
    <div class="several-pages">
        {{$users->render()}}
    </div>
</section>
      
@endsection