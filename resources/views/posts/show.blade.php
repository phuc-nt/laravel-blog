@extends('main')

@section('stylesheets')

@endsection

@section('title', ' | View Post')

@section('content')
	
<div class="row">

	<!-- Post contents -->
   	<div class="col-md-8">
		<h1>{{ $post->title }}</h1>
		<p class="lead">{{ $post->body }}</p>
	</div>
	
	<!-- Side bar -->
	<div class="col-md-4">
		<div class="well">
	     	
			<dl class="dl-horizontal">
				<dt>Create At:</dt>
				<dd>{{ date('D y/n/j h:m', strtotime($post->created_at)) }}</dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>Last Updated At:</dt>
				<dd>{{ date('D y/n/j h:m', strtotime($post->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!!  Html::linkRoute(	'posts.edit', 
											'Edit', 
											[$post->id], 
											['class' => 'btn btn-primary btn-block']) 
					!!}
				</div>
				<div class="col-sm-6">
					{!!  Html::linkRoute(	'posts.destroy', 
											'Delete', 
											[$post->id], 
											['class' => 'btn btn-danger btn-block']) 
					!!}
				</div>
			</div>

		</div>
    </div>

</div>
@endsection

@section('scripts')

@endsection