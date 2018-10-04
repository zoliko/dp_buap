<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasAniosExperienciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_AREAS_ANIOS_EXPERIENCIA', function (Blueprint $table) {
            $table->increments('AREAS_ANIOS_EXPERIENCIA_ID');
            $table->string('AREAS_ANIOS_DESCRIPCION');
            $table->integer('AREAS_ANIOS_ESTATUS');
            $table->text('AREAS_ANIOS_MENSAJE');
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
        Schema::dropIfExists('areas_anios_experiencia');
    }
}
