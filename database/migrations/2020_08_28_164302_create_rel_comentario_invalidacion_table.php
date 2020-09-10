<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelComentarioInvalidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_COMENTARIO_INVALIDACION', function (Blueprint $table) {
            $table->unsignedInteger('FK_COMENTARIO');
            $table->foreign('FK_COMENTARIO')->references('COMENTARIOS_ID')->on('DP_COMENTARIOS');

            $table->unsignedInteger('FK_ARCHIVO');
            $table->foreign('FK_ARCHIVO')->references('ARCHIVOS_ID')->on('DP_ARCHIVOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_COMENTARIO_INVALIDACION');
    }
}
