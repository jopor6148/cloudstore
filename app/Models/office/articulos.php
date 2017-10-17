<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
  protected $table ='articulos';
  protected $connection ="corecloudstore";
  protected $primaryKey = "ArticuloID";
  protected $fillable =
  [
    "ArticuloID",
    "LoteID",
    "Codigo",
    "Costo",
    "PrecioMenudeo",
    "PrecioMayoreo",
    "Imagen",
    "Descripcion",
    "Estatus",
    "FechaCreacion",
    "FechaModificacion",
    "ModificadoPor",
    "created_at",
  ];

  protected $append = [
    'abstract',
  ];

  public function inventarios (){
    return $this->belongsToMany("cloudstore\Models\office\inventarios","ArticuloID","ArticuloID");
  }
}
