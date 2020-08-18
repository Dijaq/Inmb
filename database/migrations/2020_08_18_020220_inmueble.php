<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inmueble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmueble', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id');
            $table->integer('operacion_id');
            $table->integer('usuario_crecion_id');
            $table->integer('ubigeo_provincia_id');
            $table->integer('ubigeo_distrito_id');
            $table->integer('ubigeo_region_id');
            $table->string('moneda');
            $table->string('titulo');
            $table->string('slug');
            $table->text('descripción');
            $table->float('precio');
            $table->float('mapa_latitud');
            $table->float('mapa_longitud');
            $table->float('mapa_zoom');
            $table->timestamp('fecha_publicacion')->nullable();
            $table->timestamp('fecha_vencimiento')->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('inmueble');
    }
}
