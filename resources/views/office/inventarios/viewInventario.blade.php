{{-- @php
  DB::connection('corecloudstore')->enableQueryLog();
@endphp --}}

<div class="contentInventario">
  <div class="divTableInventario">
    <table class="contentTable">
      <thead>
        <tr>
          <th>Articulo</th>
          <th>Pedimento</th>
          <th>Lote</th>
          <th>Cantidad</th>
          <th>copntroles</th>
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
              <td><button type="button" name="button">Editar</button></td>
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
        <tr>
          <td></td>
          <td></td>
          <td>
            <select class="" name="">
              <option value="none">selecciona articulo</option>
              @foreach (cloudstore\Models\office\articulos::get() as $key => $value)
                <option value="{{$value->ArticuloID}}">{{$value->Descripcion}}</option>
              @endforeach
            </select>
          </td>
          <td>
            <input type="text" name="Cantidad" value="">
          </td>
          <td>
            <button type="button" name="button">Enviar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
{{-- {{dump(DB::connection("corecloudstore")->getQueryLog())}} --}}
