<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrestadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('cpf');
            $table->string('identidade');
            $table->string('funcao');
            $table->string('salario');
            $table->date('dt_pg');
            $table->string('carga_horaria');
            $table->string('datas_horarios');
            $table->string('status');
            $table->string('diretoria');
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
        Schema::dropIfExists('prestadores');
    }
}
