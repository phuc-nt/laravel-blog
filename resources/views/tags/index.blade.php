@extends('main')

@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}	
@endsection

@section('title', ' | All Tags')

@section('content')

<div class="row">
	
	<div class="col-md-8">
		<h1>All Tags</h1>
		<hr>

		<table class="table">
    		<thead>
    			<th>#</th>
    			<th>Name</th>
    			<th>Created At</th>
    		</thead>

    		<tbody>
				@foreach ($tags as $tag)
					
					<tr>
						<th>{{ $tag->id }}</th>
						<td>{{ $tag->name }}</td>
						<td>{{ date('D y/n/j h:m', strtotime($tag->created_at)) }}</td>
						<td>
							{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
		        				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm' ]) }}
		 					{!! Form::close() !!}
						</td>
					</tr>

				@endforeach
    		</tbody>
		</table>

		<div class="text-center">
			{!! $tags->links(); !!}
		</div>
	</div>

	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			{!! Form::open(['route' => 'tags.store', 'methode' => 'POST', 'data-parsley-validate' => '']) !!}
				<h2>New Tag</h2>

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