<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechasValidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_FECHAS_VALIDACION', function (Blueprint $table) {
            $table->increments('FECHAS_VALIDACION_ID');
            $table->date('FECHAS_VALIDACION_ELABORACION');
            $table->date('FECHAS_VALIDACION_REVISION');
            $table->date('FECHAS_VALIDACION_VOBO');
            $table->date('FECHAS_VALIDACION_AUTORIZACION');
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
        Schema::dropIfExists('DP_FECHAS_VALIDACION');
    }
}
