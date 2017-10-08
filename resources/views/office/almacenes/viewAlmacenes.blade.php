@extends('office/layoutOffice')
@section('css')
  <link rel="stylesheet" href="{{url("css/office/almacenes.css")}}">
@endsection
@section('js')
<script src="{{url("js/office/almacenes/almacenes.js")}}" charset="utf-8"></script>
<script type="text/javascript">
$rutaAlmacenes = "{{url("")}}";
</script>
@endsection
@section('content')
  <div class="contentAlmacenes">

    @if (session()->has('respuesta'))
      <div class="mensajes">
        <ul>
          @foreach (session('respuesta') as $key => $value)
            <li>{{$value}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="errors">
      {{dump(@$errors)}}
    </div>

    <div class="tableAlmacenes">
      <h3>Almacenes</h3>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Sucursal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($almacenes as $key => $value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->AlmacenID}}</td>
                <td>{{$value->NombreAlmacen}}</td>
                <td>@foreach ($value->sucursal()->get() as $keysucursal => $valuesucursal)
                  {{$valuesucursal->NombreSucursal}}
                @endforeach</td>
                <td><button type="button" class="editarSucursal" name="{{$value->AlmacenID}}" suc="{{$value->AlmacenID}}">Editar</button></td>
              </tr>
            @empty
            @endforelse
            <tr>
              <form class="" action="" method="post">
                {{ csrf_field() }}
                <td>Agregar Almacen</td>
                <td>Codigo</td>
                <td><input type="text" name="Nombre" value="" placeholder="Nombre"></td>
                <td>
                  <select class="" name="SucursalID">
                    <option value="none" selected disabled>Sucursal</option>
                    @foreach (cloudstore\Models\office\sucursale::where(["Estatus"=>1])->get() as $kSuc => $vsuc)
                      <option value="{{$vsuc->SucursalID}}">{{$vsuc->SucursalID}}</option>
                    @endforeach
                  </select>
                </td>
                <td><button type="submit" name="agregarAlm" value="agregarAlm">Agregar</button></td>
              </form>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="divInventario">
      <h3>inventarios</h3>
      <div class="divReporteInv">

      </div>
    </div>

    <div class="divContrlesSucursal">


    </div>


  </div>
@endsection
