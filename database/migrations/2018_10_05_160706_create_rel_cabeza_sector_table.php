<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelCabezaSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_CABEZA_SECTOR', function (Blueprint $table) {
            $table->unsignedInteger('FK_DEPENDENCIA');
            $table->foreign('FK_DEPENDENCIA')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');

            $table->unsignedInteger('FK_CABEZA_SECTOR');
            $table->foreign('FK_CABEZA_SECTOR')->references('DEPENDENCIAS_ID')->on('DP_DEPENDENCIAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_CABEZA_SECTOR');
    }
}
