<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Almacenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("corecloudstore")->create("almacenes",function(Blueprint $table){
          $table->bigIncrements("AlmacenID");
          $table->bigInteger("SucursalID");
          $table->string("NombreAlmacen",100);
          $table->integer("Estatus" );
          $table->integer("TipoAlmacen");
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('corecloudstore')->dropIfExists('almacenes');
    }
}
