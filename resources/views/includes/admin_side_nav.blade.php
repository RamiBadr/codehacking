{{--<ul class="nav navbar-nav navbar-right">--}}
    {{--@if(auth()->guest())--}}
    {{--@if(!Request::is('auth/login'))--}}
    {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
    {{--@endif--}}
    {{--@if(!Request::is('auth/register'))--}}
    {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
    {{--@endif--}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

    {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endif--}}
    {{--</ul>--}}

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/users')}}">All Users</a>
                    </li>
                    <li>
                         <a href={{url('admin/users/create')}}>Create User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('posts.index')}}">All Posts</a>
                    </li>
                    <li>
                       <a href="{{route('posts.create')}}">Create Post</a>
                    </li>
                    <li>
                        <a href="{{route('comments.index')}}">All Comments</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('categories.index')}}">All Categories</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('media.index')}}">All Media</a>
                    </li>

                    <li>
                        <a href="{{route('media.create')}}">Upload Media</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>


    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>