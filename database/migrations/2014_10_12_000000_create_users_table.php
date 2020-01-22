<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('username', 40)->unique();
            $table->string('password');
            $table->string('email', 100);
            $table->string('picture');
            $table->string('link')->nullable();
            $table->string('phone', 11);
            $table->boolean('status');
            $table->boolean('uploadPhoto');
            $table->unsignedInteger('cityId');
            $table->index('cityId')->default(6);
            $table->integer('level');
            $table->string('invitationCode', 6);
            $table->longText('api_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cityId')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
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
