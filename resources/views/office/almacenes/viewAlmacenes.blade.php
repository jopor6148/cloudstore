@extends('office/layoutOffice')
@section('css')
  <link rel="stylesheet" href="{{url("css/office/almacenes.css")}}">
@endsection
@section('js')
<script src="{{url("js/office/almacenes.js")}}" charset="utf-8"></script>
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
      {{-- {{dump(@$errors)}}
      {{dump(@$sucursal)}} --}}
    </div>

    <div class="tableAlmacenes contentTable">
      <h3>Almacenes</h3>
        <table id="tableAlmacenes">
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
              <tr almacen="{{$value->AlmacenID}}">
                <td>{{$key+1}}</td>
                <td>{{$value->AlmacenID}}</td>
                <td>{{$value->NombreAlmacen}}</td>
                <td>@foreach ($value->sucursal()->get() as $keysucursal => $valuesucursal)
                  {{$valuesucursal->NombreSucursal}}
                @endforeach</td>
                <td>
                  {{-- <button type="button" class="editarSucursal" name="{{$value->AlmacenID}}" suc="{{$value->AlmacenID}}">Editar</button> --}}
                </td>
              </tr>
            @empty
            @endforelse
            <tr>

                <td>Agregar Almacen</td>
                <td>Codigo</td>
                <td><input type="text" name="Nombre" value="" placeholder="Nombre"></td>
                <td>
                @if (!isset($sucursal))
                  <select class="" name="SucursalID">
                    <option value="none" selected disabled>Sucursal</option>
                    @foreach (cloudstore\Models\office\sucursale::where(["Estatus"=>1])->get() as $kSuc => $vsuc)
                      <option value="{{$vsuc->SucursalID}}">{{$vsuc->SucursalID}}</option>
                    @endforeach
                  </select>
                @else
                @endif
                </td>
                <td>
                  <form class="formAgregaAlmacen" action="{{url("office/almacenes")}}" method="post">
                                  {{ csrf_field() }}
                    <input type="hidden" name="Nombre" value="" placeholder="Nombre">
                    <input type="hidden" name="SucursalID" value="{{@$sucursal}}">
                    <button type="submit" name="agregarAlm" value="agregarAlm">Agregar</button>
                  </form>
                </td>



            </tr>
          </tbody>
        </table>
    </div>

    <div class="divInventario">
      <h3>inventarios</h3>
      <div class="divReporteInv">

      </div>
    </div>


    <div class="divArticulos">
      <h3>Todos los articulos</h3>
      <div class="divTabla articulos contentTable">
        <table class="">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Precio Menu.</th>
              <th>Precio Mayo.</th>
            </tr>
          </thead>
          <tbody>
            @forelse (cloudstore\models\office\articulos::get() as $key => $value)
              <tr>
                <td>{{$value->Codigo}}</td>
                <td>{{$value->Descripcion}}</td>
                <td>{{$value->PrecioMenudeo}}</td>
                <td>{{$value->PrecioMayoreo}}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4">Sin articulos</td>
              </tr>
            @endforelse
            <tr>
              <td>
                <input type="text" name="Codigo" value="">
              </td>
              <td>
                <input type="text" name="Descripcion" value="">
              </td>
              <td>
                <input type="text" name="PrecioMenudeo" value="">
              </td>
              <td>
                <input type="text" name="PrecioMayoreo" value="">
              </td>
              <td>
                <button type="button" name="agregarArticulo">Enviar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="divContrlesSucursal">


    </div>


  </div>
@endsection
