<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMateriais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('produto');
            $table->string('cautelavel');
            $table->string('validade');
            $table->string('qtn');
            $table->string('valor_un');
            $table->string('fornecedor');
            $table->string('categoria');
            $table->string('status');
            $table->string('tipo');
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
        Schema::dropIfExists('materiais');
    }
}
