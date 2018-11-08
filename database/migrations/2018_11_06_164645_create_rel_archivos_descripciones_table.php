<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelArchivosDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_ARCHIVOS_DESCRIPCIONES', function (Blueprint $table) {
            $table->unsignedInteger('FK_ARCHIVO');
            $table->foreign('FK_ARCHIVO')->references('ARCHIVOS_ID')->on('DP_ARCHIVOS');

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
        Schema::dropIfExists('REL_ARCHIVOS_DESCRIPCIONES');
    }
}
