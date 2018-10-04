<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_PUESTOS_CLIENTES', function (Blueprint $table) {
            $table->increments('PUESTOS_CLIENTES_ID');
            $table->string('PUESTOS_CLIENTES_DESCRIPCION');
            $table->text('PUESTOS_CLIENTES_PRODUCTO');
            $table->enum('PUESTOS_CLIENTES_FRECUENCIA',['VARIABLE','DIARIO','SEMANAL','QUINCENAL','MENSUAL','TRIMESTRAL','SEMESTRAL','ANUAL']);
            $table->integer('PUESTOS_CLIENTES_ESTATUS');
            $table->text('PUESTOS_CLIENTES_MENSAJE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DP_PUESTOS_CLIENTES');
    }
}
