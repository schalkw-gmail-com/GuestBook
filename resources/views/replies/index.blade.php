@extends('template')
@section('title', 'Messages')

@section('content')
  @include('__includes/nav_messagereplies')
  <div class="container">
    <div class="jumbotron">
      <h1>Message Index</h1>
      @foreach($replies as $reply)
        <article>
          <h4>
            <a href="{{route('replies.show',$reply->id)}}">{{ $reply->reply }}</a>
          </h4>
        </article>
      @endforeach
    </div>
  </div>
@endsection

