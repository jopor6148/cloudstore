<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class lotes extends Model
{
  protected $table ='lotes';
  protected $connection ="corecloudstore";

  protected $fillable =
  [
    "LoteID",
    "Numero",
    "FechaCaducidad",
    "FechaEntrada",
  ];

  protected $append = [
    'abstract',
  ];

  public function inventarios (){
    return $this->belongsToMany("cloudstore\Models\office\inventarios","LoteID","LoteID");
  }
}
