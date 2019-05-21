@extends('template')

@section('content')
  <div class="container">
    <h1>{{ $message->message }}</h1>

    <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
      {{ csrf_field() }}
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
@endsection