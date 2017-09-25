<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mysql')->create('sucursales', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedBigInteger('SucursalID')->unique();
        $table->string('Nombre',300);
        $table->string('Direccion',300);
        $table->string('Ciudad',100);
        $table->string('Estado',100);
        $table->string('CP',10);
        $table->string('Pais',100);
        $table->string('Descripcion',500);
        $table->enum('Estatus', [0,1]);
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
        Schema::connection('mysql')->dropIfExists('sucursales');
    }
}
