<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_casts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movies_id');
            $table->unsignedBigInteger('casts_id');
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
        Schema::dropIfExists('movie_casts');
    }
}
