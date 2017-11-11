@extends('office.layoutOffice')
@section('css')
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap-theme.min.css")}}">
  <style media="screen">
    .divFormAltaArticulo{
      width: 50%;
    }

    .divFormAltaArticulo input{
      width: 100%;
      margin: 5px;
    }

    .headArticulos{
      width: 100%;
    }
  </style>
@endsection
@section('js')
  <script src="{{url("assets/bootstrap/js/bootstrap.min.js")}}" charset="utf-8"></script>
@endsection
@section('content')

  <div class="contentArticulos">

    <div class="headArticulos">
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


      <div class="contenido">

        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#articulos" aria-controls="articulos" role="tab" data-toggle="tab">Artuculos</a></li>
          <li role="presentation"><a href="#alta" aria-controls="alta" role="tab" data-toggle="tab">Alta</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="articulos">

            <table>
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Precio Mayoreo</th>
                  <th>Precio Menudeo</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($articulos as $key => $value)
                  <tr>
                    <td>{{$value->Codigo}}</td>
                    <td>{{$value->Descripcion}}</td>
                    <td>{{$value->PrecioMayoreo}}</td>
                    <td>{{$value->PrecioMenudeo}}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4"> Sin articulos</td>
                  </tr>
                @endforelse
              </tbody>
            </table>



          </div>
          <div role="tabpanel" class="tab-pane" id="alta">

            <div class="divFormAltaArticulo">
              <form class="formAltaArticul" action="" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="fcn" value="altaArticulo">
                <input type="text" name="Codigo" value="" placeholder="Codigo">
                <input type="text" name="Descripcion" value="" placeholder="Descripcion">
                <input type="text" name="Costo" value="" placeholder="Precio">
                <input type="text" name="PrecioMayoreo" value="" placeholder="Precio Mayoreo">
                <input type="text" name="PrecioMenudeo" value="" placeholder="PrecioMenudeo">
                <input type="submit" name="submitAltaarticulo" value="Enviar">
              </form>
            </div>

          </div>
        </div>

      </div>
  </div>

@endsection
