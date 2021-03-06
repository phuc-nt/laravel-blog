@extends('main')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}
@endsection

@section('title', ' | Edit Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Post</h1>
			<hr>
				
				{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
	    			{{ Form::label('title', 'Title: ') }}
					{{ Form::text('title', $post->title, ['class' => 'form-control', 'required' => '', 'maxlength' => '225']) }}
					
					{{ Form::label('body', 'Body: ') }}
					{{ Form::textarea('body', $post->body, ['class' => 'form-control', 'required' => '']) }}

					{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:10px' ]) }}
				{!! Form::close() !!}
			
		</div>
	</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection

