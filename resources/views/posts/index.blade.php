@extends('main')

@section('stylesheets')
	
@endsection

@section('title', ' | All Posts')

@section('content')

<div class="row">

	<div class="col-md-8">
		<h1>All Posts</h1>
	</div>

	<div class="col-md-2 col-md-offset-2">
		<a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-block btn-h1-spacing">Create New Post</a>
		<!--
		{!!  Html::linkRoute('posts.create', 'Create New Post', null, ['class' => 'btn btn-lg btn-primary btn-block']) !!}
		-->
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
    			<th>Body</th>
    			<th>Created At</th>
    			<th>Updated At</th>
    			<th></th>
    		</thead>

    		<tbody>
				@foreach ($posts as $post)
					
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>{{ $post->category->name }}</td>
						<td>{{ mb_substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
						<td>{{ date('D y/n/j h:i', strtotime($post->created_at)) }}</td>
						<td>{{ date('D y/n/j h:i', strtotime($post->updated_at)) }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-success">View</a>
							{{-- 
							{!! Html::linkRoute('posts.show', 'View', [$post->id], ['class' => 'btn btn-sm btn-success']) !!} --}}
							{!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-sm btn-primary']) !!}
						</td>
					</tr>

				@endforeach
    		</tbody>
		</table>

		<div class="text-center">
			{!! $posts->links(); !!}
		</div>
	</div>

</div>

@endsection

@section('scripts')
	
@endsection