<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripComments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tripPlaceId');
            $table->index('tripPlaceId');
            $table->unsignedInteger('uId');
            $table->index('uId');
            $table->string('description', 300);
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tripComments');
    }
}
