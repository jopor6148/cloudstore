{{-- @php
  DB::connection('corecloudstore')->enableQueryLog();
@endphp --}}

<div class="contentInventario">
  <div class="divTableInventario">
    <table>
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
          @forelse ($datos[0]->articulos()->select(["inventarios.*","articulos.*"])->get() as $key => $value)
            <tr>
              <td>{{$value->Descripcion}}</td>
              <td>{{$value->PedimentoID}}</td>
              <td>{{$value->LoteID}}</td>
              <td>{{$value->Cantidad}}</td>
            </tr>
          @empty
            <tr>
              <td colspan="4">sin articulos</td>
            </tr>
          @endforelse
        @else
          <tr>
            <td colspan="4">sin articulos</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
{{-- {{dump(DB::connection("corecloudstore")->getQueryLog())}} --}}
