@extends('template')
@section('content')
    <div class="container">
        <h1>Welcome to the GuestBook!</h1>
    </div>
    <div class="container">


        @guest
            <p>Welcome Guest. You are allowed to see the messages that was logged on the system.</p>
            <p>Please login to receive more functionality</p>
        @else
            <p>Welcome {{ Auth::user()->name }}. </p>
            <p>You were are assigned the following roles:
                @foreach ( Auth::user()->roles as $role)
                    {{$role}}
                @endforeach

                @if ($role == 'ROLE_USER')
                    <br>You have CRUD access to your messages
                @elseif ($role == 'ROLE_ADMIN')
                    <br>You have CRUD access to your messages and you can reply to a user message
                @endif
            </p>
        @endguest
        @foreach ($messages as $message)
            <div class="container">
                <h3> {{ $message->title }}</h3>
                <p class="lead"> {{ $message->content }}</p>
                <h6>Submitted By: {{ $message->user->name }}, {{ $message->created_at->diffForHumans() }} </h6>
            </div>
            <hr />
        @endforeach
        {{ $messages->links() }}
    </div>
@endsection
{{--@section('content')--}}
{{--<div class="container" style="display:none;">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="container">--}}
    {{--<div class="jumbotron">--}}
        {{--<h1>Welcome to the Guestbook</h1>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
