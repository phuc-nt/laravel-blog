@extends('main')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('title', " | Forgot my Password")

@section('content')
	
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">Reset Password</div>
			
			<div class="panel-body">
				
				{!! Form::open(['route' => 'resetPwd', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

					{{ Form::hidden('token', $token) }}
					
					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', $email, ['class' => 'form-control', 'required' => '']) }}

					{{ Form::label('password', 'New Password: ', ['class' => 'form-spacing-top']) }}
					{{ Form::password('password', ['class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '225']) }}

					{{ Form::label('password_confirmation', 'Password Confirm: ', ['class' => 'form-spacing-top']) }}
					{{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '225']) }}

					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-lg btn-block form-spacing-top']) }}

				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection