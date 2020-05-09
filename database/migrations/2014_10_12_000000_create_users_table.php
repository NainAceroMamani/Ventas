<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('sur_name', 50)->nullable();
            $table->string('dni' ,10)->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('imagen', 80)->nullable();
            $table->string('ruc', 20)->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('role')->default('Cliente'); // Admin, Cliente
            $table->string('status', 10)->default('activo'); // desactivo activo eliminado
            $table->integer('maxpuestos')->default(1);
            $table->string('longitud', 20)->nullable();
            $table->string('useragent', 30)->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->unsignedInteger('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_social_accounts' , function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('provider');
            $table->string('provider_uid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_social_accounts');
        Schema::dropIfExists('users');
    }
}
