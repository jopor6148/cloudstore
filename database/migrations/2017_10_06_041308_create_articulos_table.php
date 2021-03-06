<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('ArticuloID');
            $table->string("Codigo",100)->unique();
            $table->float("Costo");
            $table->float("PrecioMenudeo");
            $table->float("PrecioMayoreo");
            $table->string("Imagen",100)->nullable(true);
            $table->string("Descripcion",300);
            $table->integer("Estatus");
            $table->integer("ModificadoPor");
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
        Schema::dropIfExists('articulos');
    }
}
