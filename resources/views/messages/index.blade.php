@extends('template')
@section('title', 'Messages')

@section('content')
  @include('__includes/nav_messages')
  <div class="container">
    <div class="jumbotron">
      <h1>Messages Index</h1>
      @foreach($messages as $message)
        <article>
          <h4>
            <a href="{{route('messages.show',$message->id)}}">{{ $message->message }}</a>
          </h4>
        </article>
      @endforeach
    </div>
  </div>
@endsection

