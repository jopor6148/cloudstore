<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class inventarios extends Model
{
  protected $table ='inventarios';
  protected $connection ="corecloudstore";

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
    return $this->hasOne("cloudstore\Models\office\pedimentos", "PedimentoID", "PedimentoID");
  }


}
