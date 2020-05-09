<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_puestos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('puesto_id');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->unsignedInteger('pago_id');
            $table->foreign('pago_id')->references('id')->on('pagos');
            
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
        Schema::dropIfExists('pago_puestos');
    }
}
