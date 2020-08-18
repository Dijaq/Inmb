<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UbiDistritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubi_distritos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('info_busqueda');
            $table->integer('provincia_id');
            $table->integer('region_id');
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
        Schema::dropIfExists('ubi_distritos');
    }
}
