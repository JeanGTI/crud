<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosgenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        //generos

        Schema::create('generos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',30);
            $table->timestamps();
        });

        //livros

        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo',30);
            $table->date('ano_lancamento');
            $table->timestamps();
        });

         //livrosgeneros

         Schema::create('livrosgeneros', function (Blueprint $table) {
            $table->integer('generos_id')->unsigned();
            $table->foreign('generos_id')->references('id')->on('generos')->onDelete('cascade');
            $table->integer('livros_id')->unsigned();
            $table->foreign('livros_id')->references('id')->on('livros')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos');
        Schema::dropIfExists('livros');
        Schema::dropIfExists('livrosgeneros');
    }
}
