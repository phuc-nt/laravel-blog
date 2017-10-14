@extends('main')

@section('stylesheets')

@endsection

@section('title', ' | View Post')

@section('content')
	
	<h1>{{ $post->title }}</h1>
	<p>{{ $post->body }}</p>

@endsection

@section('scripts')

@endsection