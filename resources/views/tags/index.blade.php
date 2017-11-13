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
    			<th></th>
    		</thead>

    		<tbody>
				@foreach ($tags as $tag)
					
					<tr>
						<th>{{ $tag->id }}</th>
						<td>{{ $tag->name }}</td>
						<td>{{ date('D y/n/j h:m', strtotime($tag->created_at)) }}</td>
						<td>
							{!! Html::linkRoute('tags.show', 'View', [$tag->id], ['class' => 'btn btn-sm btn-success']) !!}
							{!! Html::linkRoute('tags.edit', 'Edit', [$tag->id], ['class' => 'btn btn-sm btn-primary']) !!}
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
			{!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
				<h2>New Tag</h2>

				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225' ]) }}

				{{ Form::submit('Create', [	'class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>

</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection