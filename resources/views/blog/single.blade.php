@extends('main')

@section('stylesheets')
  	{!! Html::style('css/parsley.css') !!}
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
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3 class="comments-title">
			<span class="glyphicon glyphicon-comment"></span>
			{{ $post->comments()->count() }} Comments
		</h3>
		@foreach($post->comments()->orderBy('id', 'desc')->paginate(10) as $comment)
			<div class="comment">
				<div class="author-info">
					<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) }}" class="author-image">
					<div class="author-name">
						<h4>{{ $comment->name }}</h4>
						<p class="comment-time">{{ date('D y/n/j h:i', strtotime($comment->created_at)) }}</p>
						{{-- <p class="comment-time">{{ $comment->created_at }}</p> --}}
					</div>
				</div>
				<div class="comment-content">
					{{ $comment->comment }}
				</div>
			</div>
		@endforeach
		<div class="text-center">
			{!! $post->comments()->orderBy('id', 'desc')->paginate(10)->links(); !!}
		</div>
		<hr>
	</div>
</div>

<div class="row">
	<div id="comment-form" class="col-md-8 col-md-offset-2">
		{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'data-parsley-validate' => '']) }}
			
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225']) }}
				</div>

				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225']) }}
				</div>

				<div class="col-md-12">
					{{ Form::label('comment', 'Comment:', ['class' => 'form-spacing-top']) }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'required' => '', 'minlength' => '10', 'maxlength' => '2000', 'rows' => '4']) }}

					{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
				</div>
			</div>

		{{ Form::close() }}
	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection