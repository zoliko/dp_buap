<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelAreaAniosDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_AREA_ANIOS_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_AREAS_ANIOS');
            $table->foreign('FK_AREAS_ANIOS')->references('AREAS_ANIOS_EXPERIENCIA_ID')->on('DP_AREAS_ANIOS_EXPERIENCIA');

            $table->unsignedInteger('FK_DESCRIPCION');
            $table->foreign('FK_DESCRIPCION')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_AREA_ANIOS_DESCRIPCION');
    }
}
