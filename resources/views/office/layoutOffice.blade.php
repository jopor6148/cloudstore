<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>office - @yield('title')</title>
  </head>
  <link rel="stylesheet" href="{{url('css/office/layout.css')}}">
  <script src="{{url("assets/jquery/jquery.min.js")}}" charset="utf-8"></script>
  @yield('css')
  @yield('js')
  <body>
    <div class="content" id="content">
      @yield('content')
    </div>
  </body>
</html>
