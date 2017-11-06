<div class="articulosEncontradosIngreso">
  <ul>
      <li class="liHeaderArticulosOngreso">
        <div class="selecciona" style="width:5%;text-align:center;">

        </div>
        <div class="codigo" style="width:30%">
          Codigo
        </div>
        <div class="descripcion" style="width:30%">
          Descripcion
        </div>
      </li>
    @forelse ($articulos as $key => $value)
      <li class="articulosIngreso">
        <div class="selecciona" style="width:5%;text-align:center;">
          <input type="checkbox" name="checkArticulosIngreso" value="{{$value->ArticuloID}}">
        </div>
        <div class="codigo" style="width:30%">
          {{$value->Codigo}}
        </div>
        <div class="descripcion" style="width:30%">
          {{$value->Descripcion}}
        </div>
      </li>
    @empty
      <li>No se encontro</li>
    @endforelse
  </ul>
</div>

<style media="screen">
.articulosEncontradosIngreso ul{
  width: 100%;
  list-style-type: none;
  margin: 0 auto;
  padding: 0px;
  margin-top: 10px;
}

.articulosEncontradosIngreso ul li{
  width: 100%;
  display: flex;
}

.articulosEncontradosIngreso ul .articulosIngreso:hover{
  background-color: #eee;
}

</style>
