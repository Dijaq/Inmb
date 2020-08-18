<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Persona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cargo_empresa');
            $table->string('correo');
            $table->string('telefono');
            $table->string('celular1');
            $table->string('celular2');
            $table->string('celular3');
            $table->string('info_busqueda');
            //$table->timestamp('fechaPublicacion')->nullable();
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
        Schema::dropIfExists('personas');
    }
}
