@extends('template')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><h3>{{ $message->title }}</h3></div>

          <div class="card-body">

            <p>{{ $message->content }}</p>

            <small id="passwordHelpBlock" class="form-text text-muted">
              Submitted By: {{ $message->user->name }}, {{ $message->created_at->diffForHumans() }}
            </small>
          </div>
        </div>

        <hr>

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

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection