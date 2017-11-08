<div class="divArticulosINgresa">
  <div class="divArticulosI">
    <ul class="ularticulosIngresa">
      @foreach ($articulos as $key => $value)
        <li class="liarticulosIngresa">
          <div class="codigoAI">
            {{$value->Codigo}}
          </div>
          <div class="descAI">
            {{$value->Descripcion}}
          </div>
          <div class="datosAI">
            <input type="hidden" name="Articulo" value="{{$value->ArticuloID}}">
            <input type="text" name="Cantidad" value="">
            <input type="text" name="Lote" value="">
            <input type="text" name="Pedimento" value="">
          </div>
        </li>
      @endforeach
    </ul>
  </div>
  <div class="divEnviaAI">
    <input type="hidden" name="almacen" value="{{$almacen}}">
    <button type="button" name="EnviaIA">Enviar</button>
  </div>
</div>
