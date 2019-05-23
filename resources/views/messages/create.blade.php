@extends('template')

@section('content')


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Write your message :</div>

          <div class="card-body">

            <form action="{{route('messages.store')}}" method="POST">
              {{ csrf_field() }}
              <input type="text" name="title"  class="form-control" id="title" value=""/>
              <textarea class="form-control" id="content" name="content"  rows="4"> </textarea>
              <button class="btn btn-success">Save</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection