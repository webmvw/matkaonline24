<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('bank_account_number')->unique()->nullable();
            $table->unsignedBigInteger('balance')->nullable();
            $table->unsignedBigInteger('role_id')->comment('1:Admin|2:User|3:Employee');
            $table->integer('status')->default('1')->comment('1:active|0:suspend');
            $table->integer('profile_verified')->default('0')->comment('0:unverified|1:verified');
            $table->string('code')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
