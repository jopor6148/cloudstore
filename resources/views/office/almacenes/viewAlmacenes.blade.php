@extends('office/layoutOffice')
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

    {{dump(@$errors)}}

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
                <td><button type="submit" name="agregarAlm" value="agregarAlm">Agregar</button></td>
              </form>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="divContrlesSucursal">

    </div>


  </div>
@endsection