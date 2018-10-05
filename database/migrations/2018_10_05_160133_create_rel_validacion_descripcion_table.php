<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelValidacionDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_VALIDACION_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_VALIDACION');
            $table->foreign('FK_VALIDACION')->references('FECHAS_VALIDACION_ID')->on('DP_FECHAS_VALIDACION');

            $table->unsignedInteger('FK_DESCRIPCION');
            $table->foreign('FK_DESCRIPCION')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');

            $table->string('FK_FACILITADOR',100);
            $table->foreign('FK_FACILITADOR')->references('USUARIOS_USUARIO')->on('DP_USUARIOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_VALIDACION_DESCRIPCION');
    }
}
