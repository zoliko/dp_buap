<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropositoGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_PROPOSITO_GENERAL', function (Blueprint $table) {
            $table->increments('PROPOSITO_GENERAL_ID');
            $table->text('PROPOSITO_GENERAL_DESCRIPCION');
            $table->integer('PROPOSITO_GENERAL_ESTATUS');
            $table->text('PROPOSITO_GENERAL_MENSAJE')->nullable();
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
        Schema::dropIfExists('DP_PROPOSITO_GENERAL');
    }
}
