@extends('main')

@section('stylesheets')
  
@endsection

@section('title', ' | Create new Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store']) !!}
    			{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}
				
				{{ Form::label('body', 'Body: ') }}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create', ['class' => 'btn btn-success btn-lg btn-block',
											'style' => 'margin-top:10px']) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')
  <script>
    //confirm('is create post');
  </script>
@endsection