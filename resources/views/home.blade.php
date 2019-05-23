@extends('template')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1>Welcome to Ask Andy!</h1>
        @guest
          <p>Welcome Guest. You are allowed to see the messages that was logged on the system.</p>
          <p>Please login to receive more functionality</p>
        @else
          <p>Welcome {{ Auth::user()->name }}. </p>

          @if (Auth::check() && (!(Auth::user()->hasRole('ROLE_ADMIN'))))
            <p>You are now a registered user, please enjoy your visit.</p>
          @endif

  @endguest
</div>
</div>
</div>

@foreach ($messages as $message)
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header"><h3>{{ $message->title }}</h3></div>

      <div class="card-body">

        <p>{{ $message->content }}</p>

        <small id="passwordHelpBlock" class="form-text text-muted">
          {{--Submitted By: {{ $message->user->name }}, {{ $message->created_at->diffForHumans() }}--}}
        </small>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
{{ $messages->links() }}
</div></div></div>
@endsection























{{--<div class="container">--}}
{{--@guest--}}
{{--<p>Welcome Guest. You are allowed to see the messages that was logged on the system.</p>--}}
{{--<p>Please login to receive more functionality</p>--}}
{{--@else--}}
{{--<p>Welcome {{ Auth::user()->name }}. </p>--}}
{{--<p>You were are assigned the following roles:--}}
  {{--@foreach ( Auth::user()->roles as $role)--}}
    {{--{{$role}}--}}
  {{--@endforeach--}}

  {{--@if ($role == 'ROLE_USER')--}}
    {{--<br>You have CRUD access to your messages--}}
  {{--@elseif ($role == 'ROLE_ADMIN')--}}
    {{--<br>You have CRUD access to your messages and you can reply to a user message--}}
  {{--@endif--}}
{{--</p>--}}
{{--@endguest--}}
{{--@foreach ($messages as $message)--}}
{{--<div class="container">--}}
  {{--<h3> {{ $message->title }}</h3>--}}
  {{--<p class="lead"> {{ $message->content }}</p>--}}
  {{--<h6>Submitted By: {{ $message->user->name }}, {{ $message->created_at->diffForHumans() }} </h6>--}}
{{--</div>--}}
{{--<hr/>--}}
{{--@endforeach--}}
{{--{{ $messages->links() }}--}}
{{--</div>--}}
{{--@endsection--}}
