<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>office - @yield('title')</title>
  </head>
  <link rel="stylesheet" href="{{url('css/office/layout.css')}}">
  <script src="{{url("assets/jquery/jquery.min.js")}}" charset="utf-8"></script>
  <script src="{{url("js/office/layoutOffice.js")}}" charset="utf-8"></script>
  @yield('css')
  @yield('js')
  <body>
    <div class="content" id="content">
      @yield('content')
    </div>



    <div class="modalCloud" style="display:none">
      <div class="cover"></div>
      <div class="modal">
        <div class="headg">
          <div class="headModal">head</div>
          <div class="headCloase">
            <span>X</span>
          </div>
        </div>
        <div class="contentModal">content</div>
        <div class="footModal">foot</div>
      </div>
    </div>


  </body>
</html>
