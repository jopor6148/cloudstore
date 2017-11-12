<?php

namespace cloudstore\Models\office;

use Illuminate\Database\Eloquent\Model;

class pedimentos extends Model
{
  protected $table ='pedimentos';
  protected $connection ="corecloudstore";

  protected $fillable =
  [
    "PedimentoID",
    "FechaEntrada",
    "Numero",
    "created_at",
  ];

  protected $append = [
    'abstract',
  ];

  public function inventarios (){
    return $this->belongsToMany("cloudstore\Models\office\inventarios","PedimentoID","PedimentoID");
  }

}
