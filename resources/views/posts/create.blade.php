@extends('main')

@section('stylesheets')
  	{!! Html::style('css/parsley.css') !!}
  	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('title', ' | Create new Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
							
    			{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225' ]) }}

				{{ Form::label('slug', 'Slug: ', ['class' => 'form-spacing-top']) }}
				{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '225' ]) }}

				{{ Form::label('category_id', 'Category: ', ['class' => 'form-spacing-top']) }}
				<select name="category_id" id="" class="form-control">
					
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				
				</select>

				{{ Form::label('tags', 'Tags: ', ['class' => 'form-spacing-top']) }}
				<select name="tags[]" id="" class="form-control js-select2-multiple" multiple="multiple">
					
					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				
				</select>

				{{ Form::label('body', 'Body: ', ['class' => 'form-spacing-top']) }}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create', [	'class' => 'btn btn-success btn-lg btn-block btn-h1-spacing']) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')
  	{!! Html::script('js/parsley.min.js') !!}
  	{!! Html::script('js/select2.min.js') !!}
	{!! Html::script('js/tinymce.min.js') !!}

  	<script>
	  	$(document).ready(function() {
		    $('.js-select2-multiple').select2();
		});

		tinymce.init({
			selector: 'textarea',
			plugins: 'link image imagetools'
		});
  	</script>
@endsection

