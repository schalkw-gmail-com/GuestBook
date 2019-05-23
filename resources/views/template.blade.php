<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
@include('__includes/nav_topnav')
<h1>  SSSSS</h1>

@guest
  Log in
@else
  {{ Auth::user() }}

  @foreach (Auth::user()->roles as $user)
    <p>This is user {{ $user }}</p>
  @endforeach
@endguest
<div >
  <a class="dropdown-item" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>







@yield('content')

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>