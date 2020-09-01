@extends('layouts.admin')

@section('content')
    <form method='post' action="{{url('media/delete')}}" class="form-inline">
          {{ csrf_field() }}
          {{method_field('delete')}}
          <select  id="" class="checkBoxArray form-control">
              <option value="delete" >Delete</option>
          </select>
          <input type="submit" class="btn btn-danger">
    
    <table class='table'>
                <thead>
                  <tr>
                    <th scope='col'><input type="checkbox" id='options'></th>
                    <th scope='col'>Id</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>Created At</th>
                  </tr> 
                </thead>
                <tbody>
                  @if ($photos)
                     @foreach ($photos as $photo)
                     <tr>
                       <td><input class='checkboxes' type="checkbox" name='checkBoxArray[]' value='{{$photo->id}}'></td>
                      <td>{{$photo->id}}</td>
                      <td><img width="50" height="50" src="{{url($photo->path)}}"></td>
                      <td>{{$photo->created_at}}</td>
                      {{-- <td>
                        {!! Form::open(['method'=>'delete', 'action'=>['AdminMediaController@destroy', $photo->id], 'class' => 'del-btn']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </td> --}}
                    </tr>   
                     @endforeach
                  @endif
                
        </tbody>
    </table>
  </form>
 
@endsection

@section('footer')
  
    <script>
      $(document).ready(function() {
        $('#options').click(function() {
          console.log('clicked');

          if(this.checked) {
               $('.checkboxes').each(function() {
                  this.checked = true;
               });
          } else {
            $('.checkboxes').each(function() {
                  this.checked = false;
               })
          }
        });
      });  
    </script>
    
@endsection