<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('activo')->default(true);

            $table->unsignedInteger('entrega_id');
            $table->foreign('entrega_id')->references('id')->on('entregas');
            $table->unsignedInteger('puesto_id');
            $table->foreign('puesto_id')->references('id')->on('puestos');
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
        Schema::dropIfExists('entrega_puestos');
    }
}
