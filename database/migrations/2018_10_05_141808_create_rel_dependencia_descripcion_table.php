<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelDependenciaDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_DEPENDENCIA_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_DEPENDENCIA');
            $table->foreign('FK_DEPENDENCIA')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');

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
        Schema::dropIfExists('REL_DEPENDENCIA_DESCRIPCION');
    }
}
