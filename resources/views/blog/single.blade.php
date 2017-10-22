@extends('main')

@section('stylesheets')

@endsection

@section('title', " | $post->title")

@section('content')
	
<div class="row">

	<!-- Post contents -->
   	<div class="col-md-8 col-md-offset-2">
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
	</div>

</div>
@endsection

@section('scripts')

@endsection