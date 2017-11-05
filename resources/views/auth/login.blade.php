@extends('main')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('title', " | Login")

@section('content')
	
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Login</h1>
		<hr>
		{!! Form::open(['route' => 'auth.login', 'data-parsley-validate' => '']) !!}
						
			{{ Form::label('email', 'Email: ') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}

			{{ Form::label('password', 'Password: ', ['class' => 'form-spacing-top']) }}
			{{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
						
			{{ Form::checkbox('remember') }}
			{{ Form::label('remember', 'Remember Me', ['class' => 'form-spacing-top']) }}

			{{ Form::submit('Login', [	'class' => 'btn btn-primary btn-lg btn-block form-spacing-top']) }}

			<a href="{{ url('password/reset') }} " class="form-spacing-top">Forgot My Password</a>

		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection