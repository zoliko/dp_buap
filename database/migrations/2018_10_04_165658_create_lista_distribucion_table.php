<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_LISTA_DISTRIBUCION', function (Blueprint $table) {
            $table->increments('LISTA_DISTRIBUCION_ID');
            $table->string('LISTA_DISTRIBUCION_PUESTO');
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
        Schema::dropIfExists('DP_LISTA_DISTRIBUCION');
    }
}
