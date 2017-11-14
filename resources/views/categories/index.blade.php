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
    			<th>Created At</th>
    			<th></th>
    			<th></th>
    		</thead>

    		<tbody>
				@foreach ($categories as $category)
					
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
						<td>{{ date('D y/n/j h:m', strtotime($category->created_at)) }}</td>
						<td>
							{!! Html::linkRoute('categories.show', 'View', [$category->id], ['class' => 'btn btn-sm btn-success']) !!}
							{!! Html::linkRoute('categories.edit', 'Edit', [$category->id], ['class' => 'btn btn-sm btn-primary']) !!}
						</td>
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