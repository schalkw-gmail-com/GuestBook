@extends('template')

@section('content')
  <div class="container">
    <h1>{{ $message->message }}</h1>

    <h6>Submitted By: {{ $message->user->name }}, {{ $message->created_at->diffForHumans() }}</h6>


    @if ($message->replies->count() > 0)
      @foreach ($message->replies as $reply)
        <div class="panel panel-default">
          <div class="panel-body">
            <p>
              {{ $reply->reply }}
            </p>
          </div>
        </div>
      @endforeach
    @else
      <p>
        There are no answers for this question yet. Please consider submitting one below!
      </p>
    @endif



    <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <hr />

    <!-- display the form, to submit a new answer -->
    <form action="{{ route('messagerepliies.store',$message->id) }}" method="POST">
      {{ csrf_field() }}

      <h4>Submit Your Own Answer:</h4>
      <textarea class="form-control" name="reply" id="reply" rows="4"></textarea>
      <input type="hidden" value="{{ $message->id }}" name="message_id" id="message_id" />
      <button class="btn btn-primary">Submit Answer</button>
    </form>


  </div>
@endsection