<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.partials.head')
  </head>
  <body class="login-page bg-body-secondary">
    @yield('content')
    @include('layouts.partials.scripts')
  </body>
</html>
