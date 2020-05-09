<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_puestos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('usuario_puestos');
    }
}
