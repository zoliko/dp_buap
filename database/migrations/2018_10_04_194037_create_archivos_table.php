<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_ARCHIVOS', function (Blueprint $table) {
            $table->increments('ARCHIVOS_ID');
            $table->string('ARCHIVOS_NOMBRE');
            $table->string('ARCHIVOS_RUTA',1000);
            //$table->enum('ARCHIVOS_TIPO',['ORGANIGRAMA','OFICIO'])->nullable();
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
        Schema::dropIfExists('DP_ARCHIVOS');
    }
}
