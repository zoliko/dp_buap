<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelProfesionAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_PROFESION_AREA', function (Blueprint $table) {
            $table->unsignedInteger('FK_PROFESION');
            $table->foreign('FK_PROFESION')->references('CAT_PROFESIONES_ID')->on('DP_CAT_PROFESIONES');

            $table->unsignedInteger('FK_AREA');
            $table->foreign('FK_AREA')->references('CAT_AREAS_ID')->on('DP_CAT_AREAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_PROFESION_AREA');
    }
}
