<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelComputacionDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_COMPUTACION_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_COMPUTACION');
            $table->foreign('FK_COMPUTACION')->references('COMPUTACION_ID')->on('DP_COMPUTACION');

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
        Schema::dropIfExists('REL_COMPUTACION_DESCRIPCION');
    }
}
