<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bazar_id');
            $table->integer('status')->comment('0:open|1:close');
            $table->time("open_time");
            $table->time("close_time");
            $table->foreign('bazar_id')->references('id')->on('bazars')->onDelete('cascade');
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
        Schema::dropIfExists('game_times');
    }
}
