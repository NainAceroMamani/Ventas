<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120)->unique();
            $table->string('description', 256)->nullable();
            $table->string('phone2', 15)->nullable();
            $table->integer('calification')->unsigned()->default(1);
            $table->string('phone', 15)->nullable();
            $table->float('precio_min', 5,2)->nullable();
            $table->string('perfil', 50)->nullable();
            $table->string('banner', 50)->nullable();
            $table->integer('maxproductos')->default(15);
            $table->integer('maxsubcategorias')->default(2);

            $table->unsignedInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plans');
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
        Schema::dropIfExists('puestos');
    }
}
