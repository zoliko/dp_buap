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
        Schema::create('DP_ACTIVIDADES_ESPECIALES', function (Blueprint $table) {
            $table->increments('ACTIVIDADES_ESPECIALES_ID');
            $table->text('ACTIVIDADES_ESPECIALES_ACTIVIDAD');
            $table->integer('ACTIVIDADES_ESPECIALES_ESTATUS');
            $table->text('ACTIVIDADES_ESPECIALES_MENSAJE');
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
        Schema::dropIfExists('DP_ACTIVIDADES_ESPECIALES');
    }
}
