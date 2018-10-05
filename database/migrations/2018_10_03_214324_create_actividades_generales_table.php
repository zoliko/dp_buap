<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_ACTIVIDADES_GENERALES', function (Blueprint $table) {
            $table->increments('ACTIVIDADES_GENERALES_ID');
            $table->text('ACTIVIDADES_GENERALES_ACTIVIDAD');
            $table->text('ACTIVIDADES_GENERALES_INDICADOR');
            $table->integer('ACTIVIDADES_GENERALES_ESTATUS');
            $table->text('ACTIVIDADES_GENERALES_MENSAJE')->nullable();
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
        Schema::dropIfExists('DP_ACTIVIDADES_GENERALES');
    }
}
