<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciaGenericaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_COMPETENCIAS_GENERICAS', function (Blueprint $table) {
            $table->increments('COMPETENCIAS_GENERICAS_ID');
            $table->string('COMPETENCIAS_GENERICAS_DESCRIPCION');
            $table->char('COMPETENCIAS_GENERICAS_GRADO',10);
            $table->integer('COMPETENCIAS_GENERICAS_ESTATUS');
            $table->text('COMPETENCIAS_GENERICAS_MENSAJE');
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
        Schema::dropIfExists('DP_COMPETENCIAS_GENERICAS');
    }
}
