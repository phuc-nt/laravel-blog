@extends('main')

@section('stylesheets')

@endsection

@section('title', " | $post->title")

@section('content')
	
<div class="row">

	<!-- Post contents -->
   	<div class="col-md-8 col-md-offset-2">
		<h1>{{ $post->title }}</h1>
		<div class="tags">
			@foreach ($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>
		<hr>
		<p>{{ $post->body }}</p>
	</div>

</div>
@endsection

@section('scripts')

@endsection