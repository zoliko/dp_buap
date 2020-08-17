<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelDescripcionesComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_DESCRIPCIONES_COMENTARIOS', function (Blueprint $table) {
            $table->unsignedInteger('FK_DESCRIPCION');
            $table->foreign('FK_DESCRIPCION')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');

            $table->unsignedInteger('FK_COMENTARIO');
            $table->foreign('FK_COMENTARIO')->references('COMENTARIOS_ID')->on('DP_COMENTARIOS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_DESCRIPCIONES_COMENTARIOS');
    }
}
