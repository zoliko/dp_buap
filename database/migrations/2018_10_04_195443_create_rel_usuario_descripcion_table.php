<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelUsuarioDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_USUARIO_DESCRIPCION', function (Blueprint $table) {
            $table->char('FK_USUARIO',50);
            $table->foreign('FK_USUARIO')->references('USUARIOS_USUARIO')->on('DP_USUARIOS')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('REL_USUARIO_DESCRIPCION');
    }
}
