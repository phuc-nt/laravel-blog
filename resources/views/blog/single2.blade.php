@extends('main2')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('title', " | $post->title")

@section('page_header')
  
    <header class="masthead" style="background-image: url('{{ asset('images/' . $post->image) }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $post->title }}</h1>
              <h2 class="subheading">Sub heading - On going to dev</h2>
              <span class="meta">Posted by
                <a href="#">Phucnt</a>
                on {{ date('D y/n/j h:i', strtotime($post->created_at)) }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

@endsection

@section('content')
  
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="badges">
        @foreach ($post->tags as $tag)
          <span class="badge badge-info">{{ $tag->name }}</span>
        @endforeach
      </div>
      <hr>
      <p>{!! $post->body !!}</p>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h3 class="comments-title">
        <span class="glyphicon glyphicon-comment"></span>
        {{ $post->comments()->count() }} Comments
      </h3>
      @foreach($post->comments()->orderBy('id', 'desc')->paginate(10) as $comment)
        <div class="comment">
          <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author-image">
            <div class="author-name">
              <h6>{{ $comment->name }}</h6>
              <div class="comment-time">{{ date('D y/n/j h:i', strtotime($comment->created_at)) }}</div>
            </div>
          </div>
          <div class="comment-content">
            {{ $comment->comment }}
          </div>
        </div>
      @endforeach
      <div class="text-center">
        {!! $post->comments()->orderBy('id', 'desc')->paginate(10)->links(); !!}
      </div>
      <hr>
    </div>
  </div>

  <div class="row">
    <div id="comment-form" class="col-lg-8 col-md-10 mx-auto">
      {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'data-parsley-validate' => '']) }}
        
        <div class="row">
          <div class="col-md-6">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225']) }}
          </div>

          <div class="col-md-6">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '225']) }}
          </div>

          <div class="col-md-12">
            {{ Form::label('comment', 'Comment:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'required' => '', 'minlength' => '10', 'maxlength' => '2000', 'rows' => '6']) }}

            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          </div>
        </div>

      {{ Form::close() }}
    </div>
  </div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection