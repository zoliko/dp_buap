<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_DEPENDENCIAS', function (Blueprint $table) {
            $table->increments('DEPENDENCIAS_ID');
            $table->string('DEPENDENCIAS_NOM_DEPENDENCIA');
            $table->string('DEPENDENCIAS_NOM_TITULAR');
            $table->integer('DEPENDENCIAS_CABEZA_SECTOR');
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
        Schema::dropIfExists('DP_DEPENDENCIAS');
    }
}
