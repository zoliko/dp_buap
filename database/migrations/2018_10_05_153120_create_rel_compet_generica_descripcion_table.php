<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelCompetGenericaDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_COMPET_GENERICA_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_COMPET_GENERICA');
            $table->foreign('FK_COMPET_GENERICA')->references('COMPETENCIAS_GENERICAS_ID')->on('DP_COMPETENCIAS_GENERICAS');

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
        Schema::dropIfExists('REL_COMPET_GENERICA_DESCRIPCION');
    }
}
