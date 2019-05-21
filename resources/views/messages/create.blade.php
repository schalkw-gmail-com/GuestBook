@extends('template')

@section('content')
  <div class="container">

<!-- display the form, to submit a new answer -->
<form action="{{ route('messages.store') }}" method="POST">
  {{ csrf_field() }}

  <h4>Ask Your Question :</h4>
  <input type="text" class="form-control" id="message" name="message"/>
  <button class="btn btn-primary">Submit Question</button>
</form>

</div>
@endsection