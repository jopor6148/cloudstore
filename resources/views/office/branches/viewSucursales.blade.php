@extends('office/layoutOffice')
@section('js')
<script src="{{url("js/office/sucursales.js")}}" charset="utf-8"></script>
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

    {{-- {{dump(@$errors)}} --}}

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

    <div class="divContrlesSucursal">

    </div>


  </div>
@endsection
