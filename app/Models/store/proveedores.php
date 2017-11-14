<?php

namespace cloudstore\Models\store;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
  protected $table ='proveedores';
  protected $connection ="corecloudstore";
  protected $primaryKey = "ProveedorID";
  protected $fillable =
  [
    "ProveedorID",
    "Nombre",
    "Correo",
    "Telefono1",
    "Telefono2",
    "Direccion1",
    "Direccion2",
    "Ciudad",
    "Estado",
    "Pais",
    "CP",
    "Descripcion",
    "Estatus",
  ];

  protected $append = [
    'abstract',
  ];
}
