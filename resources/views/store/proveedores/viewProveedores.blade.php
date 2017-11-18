@extends('office/layoutOffice')
@section('title')
Proveedores
@endsection
@section('css')
<style media="screen">
  .tablaProveedores tbody tr:hover{
    cursor: pointer;
  }
  .divformAltaProveedores input{
    margin: 3px;
  }
</style>
@endsection
@section('js')
<script src="{{url("js/store/proveedores/proveedores.js")}}" charset="utf-8"></script>
@endsection
@section('content')

  <div class="contenidoProveedores col-md-12">

    <div class="col-md-12">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ @$error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if (Session::has('mensaje'))
        {{-- {{dd(session("mensaje"))}} --}}
          <div class="alert alert-success">
              <ul>
                <?php $mensajes= Session::get('mensaje');?>
                  @foreach ($mensajes as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>


    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#proveedores" aria-controls="proveedores" role="tab" data-toggle="tab">Proveedores</a></li>
      <li role="presentation" class=""><a href="#alta" aria-controls="alta" role="tab" data-toggle="tab">Alta</a></li>
    </ul>

    <div class="tab-content">

      {{-- listado de proveedores  --}}


      <div role="tabpanel" class="tab-pane fade in active" id="proveedores">


        <div class="divTablrProveedores col-md-6">

          <table class="table table-striped tablaProveedores">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono1</th>
                <th>Direccion1</th>
                <th>Descripcion</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($proveedores as $key => $value)
                <tr proveedor="{{$value->ProveedorID}}">
                  <td>{{$value->Nombre}}</td>
                  <td>{{$value->Correo}}</td>
                  <td>{{$value->Telefono1}}</td>
                  <td>{{$value->Direccion1}}</td>
                  <td>{{$value->Descripcion}}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5">Sin proveedores</td>
                </tr>
              @endforelse
            </tbody>
          </table>


        </div>
        <div class="divInfoProveedor col-md-6">
          <h3>Selecciona Proveedor</h3>
        </div>


      </div>



      {{-- Alta de proveedores --}}


      <div role="tabpanel" class="tab-pane fade in" id="alta">

        <div class="divformAltaProveedores col-md-6">
          <form class="form-horizontal" action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="fcn" value="altaProveedor">

            <input class="form-control" type="text" name="Nombre" value="" placeholder="Nombre">
            <input class="form-control" type="text" name="Correo" value="" placeholder="Correo">
            <input class="form-control" type="text" name="Telefono1" value="" placeholder="Telefono1">
            <input class="form-control" type="text" name="Telefono2" value="" placeholder="Telefono2">
            <input class="form-control" type="text" name="Direccion1" value="" placeholder="Direccion">
            <input class="form-control" type="text" name="CP" value="" placeholder="CP">
            <input class="form-control" type="text" name="Direccion2" value="" placeholder="Referencias">
            <input class="form-control" type="text" name="Ciudad" value="" placeholder="Ciudad">
            <input class="form-control" type="text" name="Estado" value="" placeholder="Estado">
            <input class="form-control" type="text" name="Pais" value="" placeholder="Pais">
            <input class="form-control" type="text" name="Descripcion" value="" placeholder="Descripcion">

            <div class="" style="clear:both">

            </div>

            <input type="submit" name="" value="Enviar">

          </form>
        </div>

      </div>

    </div>


  </div>

@endsection
