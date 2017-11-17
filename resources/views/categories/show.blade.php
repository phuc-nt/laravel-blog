@extends('main')

@section('stylesheets')

@endsection

@section('title', " | $category->name Category")

@section('content')
	
<div class="row">
	<div class="col-md-8">
		<h1>"{{ $category->name }}" Category <small>( {{ $category->posts()->count() }} Posts )</small></h1>
	</div>

	<div class="col-md-2">
		<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">Edit</a>
	</div>

	<div class="col-md-2">
		{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-lg btn-block btn-h1-spacing' ]) }}
		{!! Form::close() !!}
	</div>

	<div class="col-md-12"><hr></div>
</div>

<div class="row">
	
	<div class="col-md-12">
		<table class="table">
    		<thead>
    			<th>#</th>
    			<th>Title</th>
    			<th>Tags</th>
    			<th>Created At</th>
    			<th>Updated At</th>
    			<th></th>
    		</thead>

    		<tbody>
				@foreach ($category->posts()->paginate(10) as $post)
					
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>
							<div class="tags">
								@foreach ($post->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
								@endforeach
							</div>
						</td>
						<td>{{ date('D y/n/j h:i', strtotime($post->created_at)) }}</td>
						<td>{{ date('D y/n/j h:i', strtotime($post->updated_at)) }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-success">View</a>
						</td>
					</tr>

				@endforeach
    		</tbody>
		</table>

		<div class="text-center">
			{!! $category->posts()->paginate(10)->links(); !!}
		</div>
	</div>

</div>

@endsection

@section('scripts')

@endsection