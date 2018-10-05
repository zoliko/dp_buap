<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelLDistribucionDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_LDISTRIBUCION_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_LISTA_DISTRIBUCION');
            $table->foreign('FK_LISTA_DISTRIBUCION')->references('LISTA_DISTRIBUCION_ID')->on('DP_LISTA_DISTRIBUCION');

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
        Schema::dropIfExists('REL_LDISTRIBUCION_DESCRIPCION');
    }
}
