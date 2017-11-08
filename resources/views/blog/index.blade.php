@extends('main')

@section('stylesheets')
	
@endsection

@section('title', ' | All Posts')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Blog</h1>
	</div>
</div>

<div class="row">
	<!-- Main contents -->
    <div class="col-md-8">
      @foreach ($posts as $post)
        <div class="post">
          <h3>{{ $post->title }}</h3>
          <h5>{{ $post->category->name }} | <i>Published: {{ date('D y/n/j h:m', strtotime($post->created_at)) }}</i></h5>
          <p>{{ mb_substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
        </div>

        <hr>
      @endforeach

    </div>

    <!-- Side contents -->
    <div class="col-md-3 col-md-offset-1">
      <h2>Side bar</h2>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!! $posts->links(); !!}
		</div>
	</div>
</div>

@endsection

@section('scripts')
	
@endsection