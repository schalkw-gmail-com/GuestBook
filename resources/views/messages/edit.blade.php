@extends('template')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">

            @if (Auth::check() && ((Auth::user()->hasRole('ROLE_ADMIN'))) )
              Edit the message :
            @else
              Edit your message :
            @endif

          </div>

          <div class="card-body">

            <form action="{{route('messages.update',$message->id)}}" method="POST">
              {{ csrf_field() }}
              @method('PATCH')
              <input type="text" name="title" class="form-control" id="title" value="{{ $message->title }}"/>
              <textarea class="form-control" id="content" name="content" rows="4"> {{ $message->content }}  </textarea>
              <input type="hidden" name="id" id="id" value="{{ $message->id }}"/>
              <button class="btn btn-primary">Save</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header"><h3>Replies</h3></div>

          <div class="card-body">

            @if ($message->replies->count() > 0)
              @foreach ($message->replies as $reply)
                <div class="panel panel-default">
                  <div class="panel-body">
                    <p>
                      {{ $reply->content }}
                    </p>
                  </div>
                </div>
              @endforeach
            @else
              <p>
                There are no answers for this question yet. Please consider submitting one below!
              </p>
            @endif
            @if (Auth::check() && ((Auth::user()->hasRole('ROLE_ADMIN'))) )
              <form action="{{ route('messagereplies.store') }}" method="POST">
                {{ csrf_field() }}
                <h4>Leave your reply :</h4>
                <input type="text" class="form-control" id="content" name="content"/>
                <input type="hidden" id="message_id" name="message_id" value="{{$message->id}}"/>
                <button class="btn btn-primary">Submit Reply</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection