<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('permanencia');
            $table->string('recebi');
            $table->string('passei');
            $table->longText('rancho');
            $table->longText('alteracao');
            $table->longText('claviculario');
            $table->integer('num_reservas');
            $table->integer('num_socios_cad');
            $table->longText('eventos');
            $table->longText('cautelas');
            $table->integer('num_piscina');
            $table->integer('puni_user_id');
            $table->integer('punicao');
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
        Schema::dropIfExists('livros');
    }
}
