@extends('template')

@section('content')
  {{--<div class="container">--}}

    {{--<form action="{{route('messagereplies.update',$reply->id)}}" method="POST">--}}
      {{--{{ csrf_field() }}--}}
      {{--<h4>Ask Your Question :</h4>--}}
      {{--<input type="text" class="form-control" id="reply" name="reply" value="{{ $reply->content }} "/>--}}
      {{--<input type="text" name="id" id="id" value="{{ $reply->id }}"/>--}}
      {{--<button class="btn btn-primary">Submit Reply</button>--}}
    {{--</form>--}}

  {{--</div>--}}

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Write a reply :</div>

          <div class="card-body">

            <form action="{{route('messagereplies.update',$reply->id)}}" method="POST">
              {{ csrf_field() }}
              @method('PATCH')
              <textarea class="form-control" id="content" name="content"  rows="4"> {{ $reply->content }}  </textarea>
              <input type="hidden" name="id" id="id" value="{{ $reply->id }}"/>
              <button class="btn btn-primary">Save</button>
            </form>

          </div>
        </div>




      </div>
    </div>
  </div>

@endsection
