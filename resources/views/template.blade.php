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

@yield('content')

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>