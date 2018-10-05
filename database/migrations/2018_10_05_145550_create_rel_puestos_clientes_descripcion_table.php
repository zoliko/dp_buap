<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelPuestosClientesDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_PUESTOS_CLIENTES_DESCRIPCION', function (Blueprint $table) {
            $table->unsignedInteger('FK_PUESTO_CLIENTE');
            $table->foreign('FK_PUESTO_CLIENTE')->references('PUESTOS_CLIENTES_ID')->on('DP_PUESTOS_CLIENTES');

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
        Schema::dropIfExists('REL_PUESTOS_CLIENTES_DESCRIPCION');
    }
}
