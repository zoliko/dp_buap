<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelArchivosDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_ARCHIVOS_DEPENDENCIAS', function (Blueprint $table) {
            $table->unsignedInteger('FK_ARCHIVO');
            $table->foreign('FK_ARCHIVO')->references('ARCHIVOS_ID')->on('DP_ARCHIVOS');

            $table->unsignedInteger('FK_DEPENDENCIA');
            $table->foreign('FK_DEPENDENCIA')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_ARCHIVOS_DEPENDENCIAS');
    }
}
