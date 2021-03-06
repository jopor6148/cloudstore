{{-- @php
  DB::connection('corecloudstore')->enableQueryLog();
@endphp --}}

<div class="contentInventario">
  <div class="divTableInventario">
    <table class="contentTable table table-hover">
      <thead>
        <tr>
          <th>Articulo</th>
          <th>Pedimento</th>
          <th>Lote</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        @if ($datos[0]->inventario)
          @forelse ($datos[0]->articulos()->select(["inventarios.*","articulos.*",DB::raw("sum(inventarios.Cantidad) as CantidadReal")]) -> groupBy(["inventarios.ArticuloID"]) ->get() as $key => $value)
            <tr>
              <td>{{$value->Descripcion}}</td>
              <td>{{$value->PedimentoID}}</td>
              <td>{{$value->LoteID}}</td>
              <td>{{$value->CantidadReal}}</td>
              <td>
                {{-- <button type="button" name="button">Editar</button> --}}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5">sin articulos</td>
            </tr>
          @endforelse
        @else
          <tr>
            <td colspan="5">sin articulos</td>
          </tr>
        @endif
        <tr>
          <td colspan="5" class="ingresoAlmacen" almacen="{{$datos[0]->AlmacenID}}">Agregar Articulos</td>
        </tr>
        {{-- <tr>
          <td colspan="5" class="ingresoAlmacen" almacen="{{$datos[0]->AlmacenID}}">Mover de Almacen</td>
        </tr>
        <tr>
          <td colspan="5" class="enviarSucursal" almacen="{{$datos[0]->AlmacenID}}">Enviar a Sucursal</td>
        </tr> --}}
      </tbody>
    </table>
  </div>
</div>
{{-- {{dump(DB::connection("corecloudstore")->getQueryLog())}} --}}
