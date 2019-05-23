@extends('template')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Edit your message :</div>

            <div class="card-body">

              <form action="{{route('messages.update',$message->id)}}" method="POST">
                {{ csrf_field() }}
                @method('PATCH')
                <input type="text" name="title"  class="form-control" id="title" value="{{ $message->title }}"/>
                <textarea class="form-control" id="content" name="content"  rows="4"> {{ $message->content }}  </textarea>
                <input type="hidden" name="id" id="id" value="{{ $message->id }}"/>
                <button class="btn btn-primary">Save</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>


@endsection