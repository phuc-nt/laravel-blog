<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>
    @include('partials._nav')
    <!-- Container -->
    <div class="container">
      @include('partials._message')

      @yield('content')

      @include('partials._footer')
    
    </div><!-- end of .container -->

    @include('partials._javascripts')
  </body>
  
</html>