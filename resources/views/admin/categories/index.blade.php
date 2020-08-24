@extends('layouts.admin')


@section('content')
    <div class="col-sm-6">
    {!! Form::open(['method'=>'post', 'action'=>'AdminCategoryController@store'] ) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['placeholder'=>'name', 'class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br>
    @include('includes.form_errors')
    </div>

    <div class="col-sm-6">
        <table class='table'>
            <thead>
              <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Name</th>
                <th scope='col'>Created At</th>
              </tr>
            </thead>
            <tbody>
             @if ($categories) 
                 @foreach ($categories as $category)
                 <tr>
                     <td>{{$category->id}}</td>
                     <td>{{$category->name}}</td>
                     <td>{{$category->created_at? $category->created_at : 'No Date'}}</td>
                     <td>
                        <a href="{{url("admin/categories/$category->id/edit")}}" class='btn btn-primary'>Edit</a>
                         {!! Form::open(['method'=>'delete', 'action'=>['AdminCategoryController@destroy', $category->id], 'class'=>'del-btn']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                         {!! Form::close() !!}
                     </td>
                  </tr>
                 @endforeach
             @endif
             
             </tbody>
</table>
    </div>
   
    
@endsection