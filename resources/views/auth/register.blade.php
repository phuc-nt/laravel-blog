@extends('main')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('title', " | Register")

@section('content')
	
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Register</h1>
		<hr>
		{!! Form::open(['route' => 'auth.register', 'data-parsley-validate' => '']) !!}
						
			{{ Form::label('name', 'Name: ') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
						
			{{ Form::label('email', 'Email: ', ['class' => 'form-spacing-top']) }}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}

			{{ Form::label('password', 'Password: ', ['class' => 'form-spacing-top']) }}
			{{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}

			{{ Form::label('password_comfirmation', 'Password Confirm: ', ['class' => 'form-spacing-top']) }}
			{{ Form::password('password_comfirmation', ['class' => 'form-control', 'required' => '']) }}

			{{ Form::submit('Register', ['class' => 'btn btn-primary btn-lg btn-block form-spacing-top']) }}
		{!! Form::close() !!}
	</div>
</div>


@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection