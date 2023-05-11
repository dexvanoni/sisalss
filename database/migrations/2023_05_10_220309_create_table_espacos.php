<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEspacos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('local');
            $table->string('reserva');
            $table->string('diretoria_resp');
            $table->string('status');
            $table->longText('obsevacoes');
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
        Schema::dropIfExists('espacos');
    }
}
