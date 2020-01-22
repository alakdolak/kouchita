<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripMembersLevelControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripMembersLevelController', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uId');
            $table->index('uId');
            $table->unsignedInteger('tripId');
            $table->index('tripId');
            $table->boolean('addFriend');
            $table->boolean('changePlaceDate');
            $table->boolean('changeTripDate');
            $table->boolean('addPlace');
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tripId')->references('id')->on('trip')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tripMembersLevelController');
    }
}
