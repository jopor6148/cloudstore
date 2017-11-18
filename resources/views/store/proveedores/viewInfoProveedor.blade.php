<div class="divInfoProveedor">
    @foreach ($proveedor as $kp => $prov)
      <ul>
        @foreach ($prov->getAttributes() as $key => $value)
          @if (!in_array($key,["ProveedorID","Estatus","created_at","updated_at"]))
            <li> <label for="">{{$key}}</label> <span>{{$value}}</span> </li>
          @endif
        @endforeach
      </ul>
    @endforeach
</div>
