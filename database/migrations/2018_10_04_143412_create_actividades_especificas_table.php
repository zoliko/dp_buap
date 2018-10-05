<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesEspecificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_ACTIVIDADES_ESPECIFICAS', function (Blueprint $table) {
            $table->increments('ACTIVIDADES_ESPECIFICAS_ID');
            $table->text('ACTIVIDADES_ESPECIFICAS_ACTIVIDAD');
            $table->integer('ACTIVIDADES_ESPECIFICAS_ESTATUS');
            $table->text('ACTIVIDADES_ESPECIFICAS_MENSAJE')->nullable();
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
        Schema::dropIfExists('DP_ACTIVIDADES_ESPECIFICAS');
    }
}
