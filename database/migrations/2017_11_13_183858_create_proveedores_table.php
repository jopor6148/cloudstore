<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('ProveedorID');
            $table->string("Nombre","200");
            $table->string("Correo","100")->nullable(true);
            $table->string("Telefono1","20")->nullable(true);
            $table->string("Telefono2","20")->nullable(true);
            $table->string("Direccion1","200")->nullable(true);
            $table->string("Direccion2","200")->nullable(true);
            $table->string("Ciudad","50")->nullable(true);
            $table->string("Estado","50")->nullable(true);
            $table->string("Pais","50")->nullable(true);
            $table->string("CP","10")->nullable(true);
            $table->string("Descripcion","500")->nullable(true);
            $table->integer("Estatus")->default(1);
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
        Schema::dropIfExists('proveedores');
    }
}
