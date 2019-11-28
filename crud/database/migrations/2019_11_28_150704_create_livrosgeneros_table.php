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
        Schema::create('livrosgeneros', function (Blueprint $table) {
            $table->integer('generos_id')->unsigned();
            $table->foreign('generos_id')->references('id')->on('generos');
            $table->integer('livros_id')->unsigned();
            $table->foreign('livros_id')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livrosgeneros');
    }
}
