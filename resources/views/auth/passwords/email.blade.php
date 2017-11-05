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
				@if(Session::has('status'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('status') }}
					</div>		
				@endif
				
				{!! Form::open(['route' => 'sendResetLink', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
					
					{{ Form::label('email', 'Email Address:') }}
					{{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}

					{{ Form::submit('Send reset link to this email', ['class' => 'btn btn-primary btn-lg btn-block form-spacing-top']) }}

				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection