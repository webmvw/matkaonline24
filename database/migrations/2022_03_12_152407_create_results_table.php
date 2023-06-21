<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_time_id');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('number');
            $table->unsignedBigInteger('point');
            $table->unsignedBigInteger('credit_point');
            $table->unsignedBigInteger('user_id');
            $table->foreign('game_time_id')->references('id')->on('game_times')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('results');
    }
}
