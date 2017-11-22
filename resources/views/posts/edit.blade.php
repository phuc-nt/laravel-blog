@extends('main')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
  	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('title', ' | Edit Post')

@section('content')
	
<div class="row">
	
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '', 'files' => true]) !!}
		<!-- Post contents -->
	   	<div class="col-md-8">
	   		{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg', 'required' => '', 'maxlength' => '225' ]) }}

			{{ Form::label('slug', 'Slug: ', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '225' ]) }}

			{{ Form::label('category_id', 'Category: ', ['class' => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => '' ]) }}

			{{ Form::label('tags', 'Tags: ', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control js-select2-multiple', 'multiple' => 'multiple']) }}

			{{ Form::label('featured_image', 'Image: ', ['class' => 'form-spacing-top']) }}
			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>
		
		<!-- Side bar -->
		<div class="col-md-4">
			<div class="well">
		     	<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
				</dl>
		     	
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('D y/n/j h:i', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated At:</label>
					<p>{{ date('D y/n/j h:i', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-block">Cancel</a>
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block' ]) }}
					</div>
					<hr>
					<div class="col-sm-12">
						<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< Show All Posts</a>
					</div>
				</div>

			</div>
	    </div>
	{!! Form::close() !!}

</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
  	{!! Html::script('js/select2.min.js') !!}
  	{!! Html::script('js/tinymce.min.js') !!}

  	<script>
	  	$(document).ready(function() {
		    $('.js-select2-multiple').select2();
		    $('.js-select2-multiple').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change')
		});

		tinymce.init({
			selector: 'textarea',
			plugins: 'link image imagetools'
		});
  	</script>
@endsection