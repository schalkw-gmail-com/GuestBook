@extends('template')

@section('content')
  <div class="container">
    <h1>{{ $reply->reply }}</h1>

    <form action="{{ route('replies.destroy',$reply->id) }}" method="POST">
      {{ csrf_field() }}
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
@endsection