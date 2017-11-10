@extends('office.layoutOffice')
@section('css')
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap-theme.min.css")}}">
@endsection
@section('js')
  <script src="{{url("assets/bootstrap/js/bootstrap.min.js")}}" charset="utf-8"></script>
@endsection
@section('content')

  <div class="contentArticulos">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#articulo" aria-controls="articulo" role="tab" data-toggle="tab">Artuculo</a></li>
        <li role="presentation"><a href="#sucursales" aria-controls="sucursales" role="tab" data-toggle="tab">Sucursales</a></li>
        <li role="presentation"><a href="#precio" aria-controls="precio" role="tab" data-toggle="tab">Precio</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="articulo">...</div>
        <div role="tabpanel" class="tab-pane" id="sucursales">...</div>
        <div role="tabpanel" class="tab-pane" id="precio">...</div>
      </div>
  </div>

@endsection
