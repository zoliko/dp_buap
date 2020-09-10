<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_REGISTRO', function (Blueprint $table) {
            $table->unsignedInteger('FK_REGISTRO');
            $table->foreign('FK_REGISTRO')->references('REGISTRO_ID')->on('DP_REGISTRO');

            $table->unsignedInteger('FK_DEPENDENCIA');
            $table->foreign('FK_DEPENDENCIA')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');
            
            $table->unsignedInteger('FK_ARCHIVO');
            $table->foreign('FK_ARCHIVO')->references('ARCHIVOS_ID')->on('DP_ARCHIVOS');
            
            $table->unsignedInteger('FK_COMENTARIO')->nullable();
            $table->foreign('FK_COMENTARIO')->references('COMENTARIOS_ID')->on('DP_COMENTARIOS');

            $table->integer('REL_REGISTRO_STATUS');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_REGISTRO');
    }
}
