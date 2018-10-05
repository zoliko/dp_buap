<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelProfesionDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_PROFESION_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_PROFESION')->nullable();
            $table->foreign('FK_PROFESION')->references('CAT_PROFESIONES_ID')->on('DP_CAT_PROFESIONES');

            $table->unsignedInteger('FK_DESCRIPCION');
            $table->foreign('FK_DESCRIPCION')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');

            $table->string('REL_PROFESION_DESCRIPCION_OTROS')->nullable();
            $table->integer('REL_PROFESION_DESCRIPCION_ESTATUS');
            $table->text('REL_PROFESION_DESCRIPCION_MENSAJE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_PROFESION_DESCRIPCION');
    }
}
