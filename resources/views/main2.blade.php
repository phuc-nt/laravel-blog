<!DOCTYPE html>
<html lang="en">

  <head>
    {{-- @include('partials._head') --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Phucnt @yield('title')</title>

    <!-- Bootstrap core CSS -->
    {{-- {!! Html::style('css/bootstrap.min.css') !!} --}}
    {!! Html::style('clean-blog/vendor/bootstrap/css/bootstrap.min.css') !!}

    <!-- Custom fonts for this template -->
    {!! Html::style('clean-blog/vendor/font-awesome/css/font-awesome.min.css') !!}
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    {!! Html::style('clean-blog/css/clean-blog.min.css') !!}
    
    <!-- OLD template -->
    {{-- {!! Html::style('css/bootstrap.min.css') !!} --}}
    {!! Html::style('css/styles.css') !!}

    @yield('stylesheets')
  </head>

  <body>
    {{-- @include('partials._nav') --}}
     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">PHUCNT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
              <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('page_header')

    <article>
      <!-- Container -->
      <div class="container">
        @include('partials._message')

        @yield('content')

        {{-- @include('partials._footer') --}}
      </div><!-- end of .container -->
    </article>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
          </div>
        </div>
      </div>
    </footer>

    {{-- @include('partials._javascripts') --}}
    {{-- {!! Html::script('js/jquery.min.js') !!} --}}
    {!! Html::script('clean-blog/vendor/jquery/jquery.min.js') !!}

    {{-- {!! Html::script('js/bootstrap.min.js') !!} --}}
    {!! Html::script('clean-blog/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}

    {!! Html::script('clean-blog/js/clean-blog.min.js') !!}
    @yield('scripts')
  </body>
  
</html>