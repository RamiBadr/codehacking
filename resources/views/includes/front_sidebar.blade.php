<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        
            {!! Form::open(['method'=>'post', 'action'=>'AdminPostsController@search']) !!}
             <div class="input-group">
                 {!! Form::text('search_text', null, ['class' => 'form-control']) !!}

                    <span class="input-group-btn">
                        {!! Form::button('<span class="glyphicon glyphicon-search"></span>', 
                        ['class'=>'btn btn-primary', 'type'=>'submit']) !!}   
                    </span>
             </div>
            {!! Form::close() !!}

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                
               
                <ul class="list-unstyled">
                    {{-- @foreach ($categories as $category)
                        <li><a href="#">{{$category->name}}</a></li>
                    @endforeach --}}
                    @if(count($categories) > 0)

                    @for ($i = 0; $i < count($categories); $i++)
                        @if ($i == 4)
                        <?php break;?>
                        @endif
                        <li><a href="{{url("category/" . $categories[$i]->id)}}">{{$categories[$i]->name}}</a></li>
                    @endfor

                    @endif
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @if(count($categories) > 4)

                    @for ($i = 4; $i < count($categories) ; $i++)
                    @if ($i == 8)
                    <?php break;?>
                    @endif
                     <li><a href="#">{{$categories[$i]->name}}</a></li>
                    @endfor

                    @endif
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>