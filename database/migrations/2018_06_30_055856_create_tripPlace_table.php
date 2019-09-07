<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripPlace', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tripId');
            $table->index('tripId');
            $table->unsignedInteger('placeId');
            $table->index('placeId');
            $table->unsignedInteger('kindPlaceId');
            $table->index('kindPlaceId');
            $table->string('date', 8);
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
        Schema::dropIfExists('tripPlace');
    }
}
