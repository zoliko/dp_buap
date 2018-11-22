<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DP_LOGIN', function (Blueprint $table) {
            $table->string('LOGIN_USUARIO',100)->unique();
            $table->string('LOGIN_CONTRASENA');
            $table->enum('LOGIN_CATEGORIA',['DIRECTOR_DRH','FACILITADOR','CABEZA_SECTOR','DIRECTOR_D/UA','ENCARGADO_D/UA','CGA']);
            $table->rememberToken();
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
        Schema::dropIfExists('DP_LOGIN');
    }
}
