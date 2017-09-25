@extends('office/layoutOffice')
@section('content')
  {{dump($sucursales)}}
  <div class="contentSucursales">

    <div class="tableSucursales">
      <h3>Sucursales</h3>
        <table>
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
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->SucursalID}}</td>
                <td>{{$value->Nombre}}</td>
                <td><button type="button" class="editarSucursal" name="{{$value->SucursalID}}" suc="{{$value->SucursalID}}">Editar</button></td>
              </tr>
            @empty
            @endforelse
            <tr>
              <form class="" action="" method="post">
                {{ csrf_field() }}
                <td>Agregar Sucursal</td>
                <td><input type="text" name="SucursalID" value="" placeholder="Codigo"></td>
                <td><input type="text" name="Nombre" value="" placeholder="Nombre"></td>
                <td><button type="submit" name="agregarSuc">Agregar</button></td>
              </form>
            </tr>
          </tbody>
        </table>
    </div>

    <div class="divContrlesSucursal">

    </div>


  </div>
@endsection
