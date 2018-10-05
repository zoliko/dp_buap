<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelActEspDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_ACT_ESP_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_ACTIVIDAD_ESPECIFICA');
            $table->foreign('FK_ACTIVIDAD_ESPECIFICA')->references('ACTIVIDADES_ESPECIFICAS_ID')->on('DP_ACTIVIDADES_ESPECIFICAS');

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
        Schema::dropIfExists('REL_ACT_ESP_DESCRIPCION');
    }
}
