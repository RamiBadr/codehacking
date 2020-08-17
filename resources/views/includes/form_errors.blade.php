@if (count($errors) > 0)
       <ul style="list-style: none">
           @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>  
           @endforeach
       </ul>
 @endif