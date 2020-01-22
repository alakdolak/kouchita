<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTripStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userTripStyles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tripStyleId');
            $table->index('tripStyleId');
            $table->unsignedInteger('uId');
            $table->index('uId');
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tripStyleId')->references('id')->on('tripStyle')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userTripStyles');
    }
}
