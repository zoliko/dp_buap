<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_COMPUTACION', function (Blueprint $table) {
            $table->increments('COMPUTACION_ID');
            $table->string('COMPUTACION_PAQUETERIA_SISTEMA');
            $table->enum('COMPUTACION_NIVEL_DOMINIO',['BASICO','MEDIO','ALTO']);
            $table->integer('COMPUTACION_ESTATUS');
            $table->text('COMPUTACION_GRADO_MENSAJE')->nullable();
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
        Schema::dropIfExists('DP_COMPUTACION');
    }
}
