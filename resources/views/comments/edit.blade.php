@extends('main')

@section('stylesheets')
  	{!! Html::style('css/parsley.css') !!}
@endsection

@section('title', ' | Edit Comment')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Edit Comment</h1>

		{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT', 'data-parsley-validate' => '']) }}
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

			{{ Form::label('email', 'Email:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}

			{{ Form::label('comment', 'Comment:', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('comment', null, ['class' => 'form-control', 'required' => '', 'minlength' => '10', 'maxlength' => '2000']) }}

			{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
		{{ Form::close() }}
	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection