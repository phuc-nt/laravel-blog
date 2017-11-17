@extends('main')

@section('stylesheets')
  
@endsection

@section('title', ' | Home')

@section('content')
  <!-- Header .row -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Hello, I'm PHUC Nguyen Trong!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ex, facere aliquid magnam illo pariatur vel, vitae iusto nostrum at! Placeat architecto eum ipsam a suscipit! Repellat vero esse dolore, deleniti ipsa! Non nihil saepe autem tempora asperiores laboriosam animi odit, mollitia nemo officia repellendus iste, eos dolor possimus harum.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a></p>
      </div>
    </div>
  </div><!-- end of header .row-->

  <!-- Body .row -->
  <div class="row">

    <!-- Main contents -->
    <div class="col-md-8">
      @foreach ($posts as $post)
        <div class="post">
          <h3>{{ $post->title }}</h3>
          <h5><i>Published: {{ date('D y/n/j h:i', strtotime($post->created_at)) }}</i></h5>
          <p>{{ mb_substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
        </div>

        <hr>
      @endforeach

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