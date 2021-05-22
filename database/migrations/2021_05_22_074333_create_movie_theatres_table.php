<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_theatres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movies_id');
            $table->unsignedBigInteger('theatre_id');
            $table->foreign('movies_id')->references('id')->on('movies')->onDelete('cascade');
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
        Schema::dropIfExists('movie_theatres');
    }
}
