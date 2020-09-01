@if (Session::has('msg'))
    <p class="alert alert-success">{{session('msg')}}</p>
@elseif(Session::has('redMsg'))
    <p class="alert alert-danger">{{session('redMsg')}}</p>
@endif

@if (Session::has('msg-reply'))
    <p class="alert alert-success">{{session('msg-reply')}}</p>
@endif