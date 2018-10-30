<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_DESCRIPCIONES', function (Blueprint $table) {
            $table->increments('DESCRIPCIONES_ID');
            $table->string('DESCRIPCIONES_NOM_PUESTO');
            $table->string('DESCRIPCIONES_REPORTA_A');
            $table->string('DESCRIPCIONES_AREA');
            $table->string('DESCRIPCIONES_DIRECCION');
            $table->enum('DESCRIPCIONES_DTP',['TIPO','PUESTO']);
            $table->string('DESCRIPCIONES_CLAVE_PUESTO');
            $table->date('DESCRIPCIONES_FECHA_CREACION');
            $table->date('DESCRIPCIONES_FECHA_REVISION')->nullable();
            $table->integer('DESCRIPCIONES_N_REVISION');
            $table->enum('DESCRIPCIONES_NIVEL',['TITULAR','SUBDIRECTOR','JEFE_DEPARTAMENTO','SUBJEFE_DEPARTAMENTO','COORDINADOR','GESTOR','PROFESIONAL','ESPECIALISTA','TECNICO','AUXILIAR']);
            $table->integer('DESCRIPCIONES_REPORTAN_DIRECTOS');
            $table->integer('DESCRIPCIONES_REPORTAN_INDIRECTOS');
            $table->enum('DESCRIPCIONES_ESTATUS_GRAL',['ELABORACION','REVISION','REVISADO','AUTORIZADO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DP_DESCRIPCIONES');
    }
}
