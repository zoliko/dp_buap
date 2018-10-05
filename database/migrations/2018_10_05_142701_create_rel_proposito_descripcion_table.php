<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelPropositoDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_PROPOSITO_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_PROPOSITO');
            $table->foreign('FK_PROPOSITO')->references('PROPOSITO_GENERAL_ID')->on('DP_PROPOSITO_GENERAL');

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
        Schema::dropIfExists('REL_PROPOSITO_DESCRIPCION');
    }
}
