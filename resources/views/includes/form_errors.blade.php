@if (count($errors) > 0)
       <ul class="list-group">
           @foreach ($errors->all() as $error)
            <li style="list-style: none" class="alert alert-danger">{{$error}}</li>  
           @endforeach
       </ul>
 @endif