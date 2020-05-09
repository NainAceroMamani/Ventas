<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 40);
            $table->string('description', 120)->nullable();
            $table->string('imagen', 80)->nullable();
            $table->boolean('activo')->default(true);
            
            $table->unsignedInteger('puesto_id');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->unsignedInteger('tipodocumento_id');
            $table->foreign('tipodocumento_id')->references('id')->on('tipo_documentos');
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
        Schema::dropIfExists('documentos');
    }
}
