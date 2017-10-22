@extends('main')

@section('stylesheets')

@endsection

@section('title', ' | View Post')

@section('content')
	
<div class="row">

	<!-- Post contents -->
   	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<p class="lead">{{ $post->body }}</p>
	</div>
	
	<!-- Side bar -->
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url:</label>
				<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
			</dl>
	     	
			<dl class="dl-horizontal">
				<label>Create At:</label>
				<p>{{ date('D y/n/j h:m', strtotime($post->created_at)) }}</p>
			</dl>

			<dl class="dl-horizontal">
				<label>Last Updated At:</label>
				<p>{{ date('D y/n/j h:m', strtotime($post->updated_at)) }}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					{{-- 
					{!!  Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!} --}}
				</div>
				<div class="col-sm-6">

					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
        				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block' ]) }}
 					{!! Form::close() !!}

				</div>
				<hr>
				<div class="col-sm-12">
					<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< Show All Posts</a>
				</div>
			</div>

		</div>
    </div>

</div>
@endsection

@section('scripts')

@endsection