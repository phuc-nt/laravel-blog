@extends('main')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('title', ' | Edit Post')

@section('content')
	
<div class="row">
	
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
		<!-- Post contents -->
	   	<div class="col-md-8">
	   		{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg', 'required' => '', 'maxlength' => '225' ]) }}

			{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '' ]) }}
		</div>
		
		<!-- Side bar -->
		<div class="col-md-4">
			<div class="well">
		     	
				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('D y/n/j h:m', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated At:</dt>
					<dd>{{ date('D y/n/j h:m', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block' ]) }}
					</div>
				</div>

			</div>
	    </div>
	{!! Form::close() !!}

</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection