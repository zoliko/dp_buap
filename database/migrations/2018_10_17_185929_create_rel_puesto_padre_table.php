<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelPuestoPadreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REL_PUESTO_PADRE', function (Blueprint $table) {
            $table->unsignedInteger('FK_PUESTO');
            $table->foreign('FK_PUESTO')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');

            $table->unsignedInteger('FK_PUESTO_PADRE');
            $table->foreign('FK_PUESTO_PADRE')->references('DESCRIPCIONES_ID')->on('DP_DESCRIPCIONES');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('REL_PUESTO_PADRE');
    }
}
