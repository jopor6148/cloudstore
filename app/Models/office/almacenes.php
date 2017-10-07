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


    public function sucursal (){
      return $this->hasOne("cloudstore\Models\office\sucursale","SucursalID","SucursalID");
    }
}
