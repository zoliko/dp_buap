<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDpComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_COMENTARIOS', function (Blueprint $table) {
            $table->increments('COMENTARIOS_ID');//poniendo increments se da por hecho que es primary
            $table->text('COMENTARIOS_COMENTARIO');
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
        Schema::dropIfExists('DP_COMENTARIOS');
    }
}
