<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class almacenes extends Model
{
    //
    protected $table ='almacenes';
    protected $connection ="corecloudstore";
    protected $fillable=
    [
      "SucursalID",
      "NombreAlmacen",
      "Estatus",
      "TipoAlmacen",
    ];

    protected $append = [
    	'abstract',
    ];

    protected $primaryKey = "AlmacenID";

    public function sucursal (){
      return $this->hasOne("cloudstore\Models\office\sucursale","SucursalID","SucursalID");
    }

    public function inventario (){
      return $this->hasOne("cloudstore\Models\office\inventarios","AlmacenID","AlmacenID");
    }


    public function articulos (){
      return $this->belongsToMany("cloudstore\Models\office\articulos","inventarios","AlmacenID","ArticuloID");
    }
}
