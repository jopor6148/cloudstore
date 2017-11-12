<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>office - @yield('title')</title>
  </head>
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap-theme.min.css")}}">
  <link rel="stylesheet" href="{{url('assets/normalize/normalize.css')}}">
  <link rel="stylesheet" href="{{url('css/office/layout.css')}}">
  <script src="{{url("assets/jquery/jquery.min.js")}}" charset="utf-8"></script>
  <script src="{{url("js/office/layoutOffice.js")}}" charset="utf-8"></script>
  <script src="{{url("assets/bootstrap/js/bootstrap.min.js")}}" charset="utf-8"></script>
  <script src="{{url("assets/jquery-ui/jquery-ui.min.js")}}" charset="utf-8"></script>
  <script src="{{url("assets/jquery-ui/jquery-ui.min.css")}}" charset="utf-8"></script>
  <script src="{{url("assets/jquery-ui/jquery-ui.theme.min.css")}}" charset="utf-8"></script>
  <script src="{{url("assets/jquery-ui/jquery-ui.structure.min.css")}}" charset="utf-8"></script>
  @yield('css')
  @yield('js')
  <body>
    <div class="content container" id="content">


      <div class="divLogo row">
        LOGO
      </div>
      <div class="divToolsNav row">
        Tools
      </div>


      <div class="contentAll row">

        <div class="divNavHorizontal col-md-2">
          <label for="">Office</label>
          <ul>
            <li> <a href="{{url("office/articulos")}}">Articulos</a> </li>
            <li> <a href="{{url("office/branches")}}">Sucursales</a> </li>
          </ul>
        </div>


        <div class="contentApps col-md-10">

          @yield('content')

        </div>
      </div>



    </div>



    <div class="modalCloud" style="display:none">
      <div class="cover"></div>
      <div class="mimodal">
        <div class="headg">
          <div class="headModal">head</div>
          <div class="headClose">
            <span>X</span>
          </div>
        </div>
        <div class="contentModal">content</div>
        <div class="footModal">foot</div>
      </div>
    </div>


  </body>
</html>
