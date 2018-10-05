<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatProfesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_CAT_PROFESIONES', function (Blueprint $table) {
            $table->increments('CAT_PROFESIONES_ID');
            $table->string('CAT_PROFESIONES_PROFESION');
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
        Schema::dropIfExists('DP_CAT_PROFESIONES');
    }
}
