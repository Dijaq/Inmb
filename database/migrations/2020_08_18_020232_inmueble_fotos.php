<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InmuebleFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmueble_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inmueble_id');
            $table->string('url_imagen');
            $table->text('descripcion');
            $table->integer('orden');
            $table->boolean('es_destacado');
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
        Schema::dropIfExists('inmueble_fotos');
    }
}
