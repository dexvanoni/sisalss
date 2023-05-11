<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCautelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('material_id');
            $table->string('validade');
            $table->string('status');
            $table->string('condicao_pago');
            $table->string('condicao_devolvido');
            $table->string('valor_pg');
            $table->longText('observacoes');
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
        Schema::dropIfExists('cautelas');
    }
}
