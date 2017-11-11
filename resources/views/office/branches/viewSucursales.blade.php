@extends('office/layoutOffice')
@section('css')

    <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap-theme.min.css")}}">
@endsection
@section('js')
<script src="{{url("js/office/sucursales.js")}}" charset="utf-8"></script>

  <script src="{{url("assets/bootstrap/js/bootstrap.min.js")}}" charset="utf-8"></script>
@endsection
@section('content')
  {{-- {{dump($sucursales)}} --}}
  <div class="contentSucursales">

    @if (session()->has('respuesta'))
      <div class="mensajes">
        <ul>
          @foreach (session('respuesta') as $key => $value)
            <li>{{$value}}</li>
          @endforeach
        </ul>
      </div>
    @endif




<div class="contentApps">

  <!-- Nav tabs -->
  <ul  class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Sucursales" aria-controls="Sucursales" role="tab" data-toggle="tab">Sucursales</a></li>
    <li role="presentation" class=""><a href="#Almacenes" aria-controls="Almacenes" role="tab" data-toggle="tab">Almacenes</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">


    <div role="tabpanel" class="tab-pane active" id="Sucursales">

      <div class="divtableSucursales">
        <h3>Sucursales</h3>
          <table class="tableSucursales contentTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sucursales as $key => $value)
                <tr sucursal="{{$value->SucursalID}}" >
                  <td>{{$key+1}}</td>
                  <td>{{$value->SucursalID}}</td>
                  <td>{{$value->NombreSucursal}}</td>
                  <td>
                    {{-- <button type="button" class="editarSucursal" name="{{$value->SucursalID}}" suc="{{$value->SucursalID}}">Editar</button> --}}
                  </td>
                </tr>
              @empty
              @endforelse
              <tr>
                <form class="" action="" method="post">
                  {{ csrf_field() }}
                  <td>Agregar Sucursal</td>
                  <td>Codigo</td>
                  <td><input type="text" name="Nombre" value="" placeholder="Nombre"></td>
                  <td>
                    <button type="submit" name="agregarSuc" value="agregarSuc">Agregar</button>
                  </td>
                </form>
              </tr>
            </tbody>
          </table>
      </div>



    </div>




    <div role="tabpanel" class="tab-pane" id="Almacenes">




          <div class="divContrlesSucursal">

          </div>



    </div>


  </div>

</div>








  </div>
@endsection
