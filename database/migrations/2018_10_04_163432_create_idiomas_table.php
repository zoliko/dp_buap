<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_IDIOMAS', function (Blueprint $table) {
            $table->increments('IDIOMAS_ID');
            $table->char('IDIOMAS_IDIOMA',100);
            $table->enum('IDIOMAS_NIVEL_DOMINIO',['BASICO','MEDIO','ALTO']);
            $table->integer('IDIOMAS_ESTATUS');
            $table->text('IDIOMAS_GRADO_MENSAJE');
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
        Schema::dropIfExists('DP_IDIOMAS');
    }
}
