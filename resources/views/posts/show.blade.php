@extends('main')

@section('stylesheets')

@endsection

@section('title', ' | View Post')

@section('content')
	
<div class="row">

	<!-- Post contents -->
   	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<div class="tags">
			@foreach ($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>
		<hr>
		<p class="">{!! $post->body !!}</p>

		<div id="backend-comments" style="margin-top: 50px;">
			<h3>Comments <small>{{ $post->comments()->count() }} totals</small></h3>

			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th>Commented At</th>
						<th width="70px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($post->comments()->orderBy('id', 'desc')->paginate(10) as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>{{ $comment->created_at }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>	
			</table>
		</div>
	</div>
	
	<!-- Side bar -->
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>Url:</label>
				<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
			</dl>

			<dl class="dl-horizontal">
				<label>Category:</label>
				<p>{{ $post->category->name }}</p>
			</dl>
	     	
			<dl class="dl-horizontal">
				<label>Create At:</label>
				<p>{{ date('D y/n/j h:i', strtotime($post->created_at)) }}</p>
			</dl>

			<dl class="dl-horizontal">
				<label>Last Updated At:</label>
				<p>{{ date('D y/n/j h:i', strtotime($post->updated_at)) }}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
					{{-- 
					{!!  Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!} --}}
				</div>
				<div class="col-sm-6">

					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
        				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block' ]) }}
 					{!! Form::close() !!}

				</div>
				<hr>
				<div class="col-sm-12">
					<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< Show All Posts</a>
				</div>
			</div>

		</div>
    </div>

</div>
@endsection

@section('scripts')

@endsection