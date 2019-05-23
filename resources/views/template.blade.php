<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

@include('__includes/nav_topnav')


{{--<h1>SSSSS</h1>--}}

{{--@guest--}}
  {{--Log in--}}
{{--@else--}}
  {{--{{ Auth::user() }}--}}

  {{--@foreach (Auth::user()->roles as $user)--}}
    {{--<p>This is user {{ $user }}</p>--}}
  {{--@endforeach--}}
{{--@endguest--}}
{{--<div >--}}
  {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
     {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
    {{--{{ __('Logout') }}--}}
  {{--</a>--}}

  {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--@csrf--}}
  {{--</form>--}}
{{--</div>--}}

{{--@yield('content')--}}
<script src="{{ asset('js/app.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>