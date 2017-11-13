@extends('main')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}	
@endsection

@section('title', ' | Edit Tag')

@section('content')

<div class="row">
	
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="well">
			{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
				<h2>Edit Tag</h2>

				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225' ]) }}

				{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
	<div class="col-md-4"></div>

</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection