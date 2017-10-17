<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class inventarios extends Model
{
  protected $table ='inventarios';
  protected $connection ="corecloudstore";
  protected $primaryKey = "AlmacenID";

  protected $fillable =
  [
    "AlmacenID",
    "PedimentoID",
    "LoteID",
    "ArticuloID",
    "Cantidad",
  ];

  protected $append = [
    'abstract',
  ];

  public function almacen (){
    return $this->hasOne("cloudstore\Models\office\sucursale", "AlmacenID", "AlmacenID");
  }

  public function pedimentos (){
    return $this->belongsToMany("cloudstore\Models\office\pedimentos", "PedimentoID", "PedimentoID");
  }

  public function articulos (){
    return $this->belongsToMany("cloudstore\Models\office\articulos","inventarios","ArticuloID","ArticuloID");
  }


  public function lotes (){
    return $this->belongsToMany("cloudstore\Models\office\lotes", "LoteID", "LoteID");
  }


}
