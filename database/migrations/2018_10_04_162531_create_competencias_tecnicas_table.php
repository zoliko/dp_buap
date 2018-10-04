<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_COMPETENCIAS_TECNICAS', function (Blueprint $table) {
            $table->increments('COMPETENCIAS_TECNICAS_ID');
            $table->string('COMPETENCIAS_TECNICAS_DESCRIPCION');
            $table->enum('COMPETENCIAS_TECNICAS_GRADO_DOMINIO',['BASICO','MEDIO','AVANZADO']);
            $table->integer('COMPETENCIAS_TECNICAS_ESTATUS');
            $table->text('COMPETENCIAS_TECNICAS_MENSAJE');
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
        Schema::dropIfExists('DP_COMPETENCIAS_TECNICAS');
    }
}
