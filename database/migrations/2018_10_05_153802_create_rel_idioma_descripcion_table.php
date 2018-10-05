<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelIdiomaDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_IDIOMA_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_IDIOMA');
            $table->foreign('FK_IDIOMA')->references('IDIOMAS_ID')->on('DP_IDIOMAS');

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
        Schema::dropIfExists('REL_IDIOMA_DESCRIPCION');
    }
}
