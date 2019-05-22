@extends('template')

@section('content')
  <div class="container">

<!-- display the form, to submit a new answer -->
<form action="{{ route('replies.store') }}" method="POST">
  {{ csrf_field() }}

  <h4>Leave your reply :</h4>
  <input type="text" class="form-control" id="reply" name="reply"/>
  <button class="btn btn-primary">Submit Rpely</button>
</form>

</div>
@endsection