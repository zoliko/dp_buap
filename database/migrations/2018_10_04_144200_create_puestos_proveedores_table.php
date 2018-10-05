<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_PUESTOS_PROVEEDORES', function (Blueprint $table) {
            $table->increments('PUESTOS_PROVEEDORES_ID');
            $table->string('PUESTOS_PROVEEDORES_DESCRIPCION');
            $table->text('PUESTOS_PROVEEDORES_INSUMO');
            $table->enum('PUESTOS_PROVEEDORES_FRECUENCIA',['VARIABLE','DIARIO','SEMANAL','QUINCENAL','MENSUAL','TRIMESTRAL','SEMESTRAL','ANUAL']);
            $table->integer('PUESTOS_PROVEEDORES_ESTATUS');
            $table->text('PUESTOS_PROVEEDORES_MENSAJE')->nullable();
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
        Schema::dropIfExists('DP_PUESTOS_PROVEEDORES');
    }
}
