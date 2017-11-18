@extends('office.layoutOffice')
@section('css')

  <style media="screen">

    .divFormAltaArticulo input{
      margin: 5px;
    }
  </style>
@endsection
@section('js')
  <script type="text/javascript">
    $(function(){

      $(document).find("input[name=FechaEntrada]").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
      });


      $(document).find("input[name=FechaCaducidad]").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
      });

    })
  </script>
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
          <li role="presentation"><a href="#alta" aria-controls="Alta" role="tab" data-toggle="tab">Alta</a></li>
          <li role="presentation"><a href="#Pedimentos" aria-controls="Pedimentos" role="tab" data-toggle="tab">Pedimentos</a></li>
          <li role="presentation"><a href="#Lotes" aria-controls="Lotes" role="tab" data-toggle="tab">Lotes</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">



          <div role="tabpanel" class="tab-pane active" id="articulos">

            <table class="table table-hover">
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

            <div class="divFormAltaArticulo col-md-6">
              <form class="formAltaArticul" action="" method="post">
                {{ csrf_field() }}
                <input class="form-control" type="hidden" name="fcn" value="altaArticulo">
                <input class="form-control" type="text" name="Codigo" value="" placeholder="Codigo">
                <input class="form-control" type="text" name="Descripcion" value="" placeholder="Descripcion">
                <input class="form-control" type="text" name="Costo" value="" placeholder="Precio">
                <input class="form-control" type="text" name="PrecioMayoreo" value="" placeholder="Precio Mayoreo">
                <input class="form-control" type="text" name="PrecioMenudeo" value="" placeholder="PrecioMenudeo">
                <div class="" style="clear:both">  </div>
                <input type="submit" name="submitAltaarticulo" value="Enviar">
              </form>
            </div>

          </div>

{{-- contenido de Pedimentos --}}

          <div role="tabpanel" class="tab-pane" id="Pedimentos">


            <div class="divAltaPedimentos col-md-6">


              <form class="formAltaArticul" action="{{url("office/articulos")}}" method="post">
                {{ csrf_field() }}
                <input class="form-control" type="hidden" name="fcn" value="altaPedimento">
                <input class="form-control" type="text" name="Numero" value="" placeholder="Numero">
                <input class="form-control" type="text" name="FechaEntrada" value="" placeholder="yyyy-mm-dd">
                <div class="" style="clear:both">  </div>
                <input  type="submit" name="submitAltaarticulo" value="Enviar">
              </form>



            </div>


          </div>



{{-- contenido de lotes --}}


          <div role="tabpanel" class="tab-pane" id="Lotes">


            <div class="divAltaLotes col-md-6">



                <form class="formAltaArticul" action="{{url("office/articulos")}}" method="post">
                  {{ csrf_field() }}
                  <input class="form-control" type="hidden" name="fcn" value="altaLote">
                  <input class="form-control" type="text" name="Numero" value="" placeholder="Numero">
                  <input class="form-control" type="text" name="FechaEntrada" value="" placeholder="Entrada yyyy-mm-dd">
                  <input class="form-control" type="text" name="FechaCaducidad" value="" placeholder="Caducidad yyyy-mm-dd">
                  <div class="" style="clear:both">  </div>
                  <input  type="submit" name="submitAltaarticulo" value="Enviar">
                </form>


            </div>


          </div>



        </div>

      </div>
  </div>

@endsection
