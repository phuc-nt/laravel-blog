@extends('main')

@section('stylesheets')
  
@endsection

@section('title', ' | Home')

@section('content')
  <!-- Header .row -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Hello, I'm {{ $data['fullname'] }}!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ex, facere aliquid magnam illo pariatur vel, vitae iusto nostrum at! Placeat architecto eum ipsam a suscipit! Repellat vero esse dolore, deleniti ipsa! Non nihil saepe autem tempora asperiores laboriosam animi odit, mollitia nemo officia repellendus iste, eos dolor possimus harum.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Lastest post</a></p>
      </div>
    </div>
  </div><!-- end of header .row-->

  <!-- Body .row -->
  <div class="row">

    <!-- Main contents -->
    <div class="col-md-8">
      <div class="post">
        <h3>Post Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quibusdam voluptatibus accusamus neque harum quam eaque iusto vel ex similique officia corporis commodi minima totam, eos voluptatem maiores magnam ipsum.</p>
        <a href="#" class="btn btn-primary">Read more</a>
      </div>

      <hr>

      <div class="post">
        <h3>Post Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quibusdam voluptatibus accusamus neque harum quam eaque iusto vel ex similique officia corporis commodi minima totam, eos voluptatem maiores magnam ipsum.</p>
        <a href="#" class="btn btn-primary">Read more</a>
      </div>

      <hr>

      <div class="post">
        <h3>Post Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quibusdam voluptatibus accusamus neque harum quam eaque iusto vel ex similique officia corporis commodi minima totam, eos voluptatem maiores magnam ipsum.</p>
        <a href="#" class="btn btn-primary">Read more</a>
      </div>

      <hr>

    </div>

    <!-- Side contents -->
    <div class="col-md-3 col-md-offset-1">
      <h2>Side bar</h2>
    </div>
  </div><!-- end of body .row-->
@endsection

@section('scripts')
  <script>
    //confirm('haha');
  </script>
@endsection

