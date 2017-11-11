@extends('main')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}	
@endsection

@section('title', ' | All Categories')

@section('content')

<div class="row">
	
	<div class="col-md-8">
		<h1>All Categories</h1>
		<hr>

		<table class="table">
    		<thead>
    			<th>#</th>
    			<th>Name</th>
    		</thead>

    		<tbody>
				@foreach ($categories as $category)
					
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>

				@endforeach
    		</tbody>
		</table>

		<div class="text-center">
			{!! $categories->links(); !!}
		</div>
	</div>

	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			{!! Form::open(['route' => 'categories.store', 'methode' => 'POST', 'data-parsley-validate' => '']) !!}
				<h2>New Category</h2>

				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225' ]) }}

				{{ Form::submit('Create', [	'class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>

</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection