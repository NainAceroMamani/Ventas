<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestoSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto_subcategorias', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('puesto_id');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->unsignedInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('puesto_subcategorias');
    }
}
