@extends('template')

@section('content')
  <div class="container">

    <form action="{{route('messages.update',$message->id)}}" method="POST">
      {{ csrf_field() }}
      <h4>Ask Your Question :</h4>
      <input type="text" class="form-control" id="message" name="message" value="{{ $message->message }} "/>
      <input type="text" name="id" id="id" value="{{ $message->id }}"/>
      <button class="btn btn-primary">Submit Question</button>
    </form>

  </div>
@endsection