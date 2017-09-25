<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>office - @yield('title')</title>
  </head>
  <link rel="stylesheet" href="{{url('css/office/layout.css')}}">
  @yield('css')
  @yield('js')
  <body>
    <div class="content" id="content">
      @yield('content')
    </div>
  </body>
</html>
