<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class sucursale extends Model
{
    /**
    * The connection name for the model.
    *
    * @var string
    */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sucursales';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      "NombreSucursal",
      "Direccion",
      "Ciudad",
      "Estado",
      "CP",
      "Pais",
      "Descripcion",
      "Estatus",
    ];

    protected $append = [
    	'abstract',
    ];

    public function  almacenes (){
      return $this->hasMany("cloudstore\Models\office\almacenes","AlmacenID");
    }
}
