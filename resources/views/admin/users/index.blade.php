@extends('layouts.admin');
   
@section('content')
    @if (Session::has('msg'))
    <div class='bg-success msg'>{{Session::get('msg')}}</div>
    @endif

    <h1>Users</h1>
 <table class='table table-hover'>
      <thead>
        <tr>
          <th scope='col'>Id</th>
          <th scope='col'>Photo</th>
          <th scope='col'>Role</th>
          <th scope='col'>Status</th>
          <th scope='col'>Name</th>
          <th scope='col'>Email</th>
          <th scope='col'>Created</th>
          <th scope='col'>Updated</th>
        </tr>           
      </thead>            
      <tbody>
        @if ($users)
          @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            {{-- <td>{{$user->photos? <img src="$user->photos->path" alt=""> : 'No Photo'}}</td> --}}
            <td>
                <img width='50' height="50" src="{{$user->photos? url($user->photos->path) : url('images/empty-avatar.png')}}" alt=''>
            </td>
            <td>{{$user->role_id? $user->roles->name : "User has no role."}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              {{$user->is_active == 1? "Active" : "Not Active"}}
              {{-- @if ($user->is_active == 1)
                      {{'true'}}
              @else
                      {{'false'}}
              @endif --}}
            </td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>
              <a href={{url("admin/users/$user->id/edit")}} class="btn btn-primary">Edit</a>
              
              {!! Form::open(['method' => 'Delete', 'action' =>['AdminUsersController@destroy', $user->id], 'class' => 'del-btn']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        @endif
      </tbody>        
 </table>
@endsection

@section('footer')
    
@endsection