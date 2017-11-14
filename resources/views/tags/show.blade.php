@extends('main')

@section('stylesheets')

@endsection

@section('title', " | $tag->name Tag")

@section('content')
	
<div class="row">
	<div class="col-md-8">
		<h1>"{{ $tag->name }}" Tag <small>( {{ $tag->posts()->count() }} Posts )</small></h1>
	</div>

	<div class="col-md-2">
		<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-lg btn-block btn-h1-spacing">Edit</a>
	</div>

	<div class="col-md-2">
		{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
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
    			<th>Category</th>
    			<th>Tags</th>
    			<th></th>
    		</thead>

    		<tbody>
				@foreach ($tag->posts()->paginate(10) as $post)
					
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>{{ $post->category->name }}</td>
						<td>
							<div class="tags">
								@foreach ($post->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
								@endforeach
							</div>
						</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-success">View</a>
						</td>
					</tr>

				@endforeach
    		</tbody>
		</table>

		<div class="text-center">
			{!! $tag->posts()->paginate(10)->links(); !!}
		</div>
	</div>

</div>

@endsection

@section('scripts')

@endsection