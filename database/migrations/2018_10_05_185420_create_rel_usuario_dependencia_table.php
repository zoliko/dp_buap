<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelUsuarioDependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_USUARIO_DEPENDENCIA', function (Blueprint $table) {
            $table->string('FK_USUARIO',100);
            $table->foreign('FK_USUARIO')->references('USUARIOS_USUARIO')->on('DP_USUARIOS');

            $table->unsignedInteger('FK_DEPENDENCIA');
            $table->foreign('FK_DEPENDENCIA')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_USUARIO_DEPENDENCIA');
    }
}
