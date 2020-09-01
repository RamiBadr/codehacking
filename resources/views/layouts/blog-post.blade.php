
  

@include('includes.front_header')

    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class= 'col-sm-8'>
                @include('includes.flash_messages')
            </div>
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes.front_sidebar')

        </div>
        <!-- /.row -->

        <hr>

        @include('includes.front_footer')
