<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bazar_id');
            $table->integer('status')->comment('0:open|1:close');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('number');
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
        Schema::dropIfExists('public_results');
    }
}
