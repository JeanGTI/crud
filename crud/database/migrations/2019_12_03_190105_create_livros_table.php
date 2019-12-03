<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo',50);
            $table->date('ano_lancamento');
            $table->unsignedBigInteger('autores_id');
            $table->unsignedBigInteger('editoras_id');
            $table->unsignedBigInteger('generos_id');   
            $table->foreign('autores_id')->references('id')->on('autores');
            $table->foreign('editoras_id')->references('id')->on('editoras');
            $table->foreign('generos_id')->references('id')->on('generos');
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