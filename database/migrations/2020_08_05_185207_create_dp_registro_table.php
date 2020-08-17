<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDpRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_REGISTRO', function (Blueprint $table) {
            $table->increments('REGISTRO_ID');
            $table->string('REGISTRO_ENCARGADO');
            $table->string('REGISTRO_CONTACTO');
            $table->string('REGISTRO_ID_TRABAJADOR');
            $table->string('REGISTRO_MAIL');
            // $table->integer('REGISTRO_DEPENDENCIA');
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
        Schema::dropIfExists('DP_REGISTRO');
    }
}
