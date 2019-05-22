@extends('template')

@section('content')
  <div class="container">

    <form action="{{route('replies.update',$reply->id)}}" method="POST">
      {{ csrf_field() }}
      <h4>Ask Your Question :</h4>
      <input type="text" class="form-control" id="reply" name="reply" value="{{ $reply->reply }} "/>
      <input type="text" name="id" id="id" value="{{ $reply->id }}"/>
      <button class="btn btn-primary">Submit Reply</button>
    </form>

  </div>
@endsection