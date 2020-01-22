<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripNote', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tripId');
            $table->index('tripId');
            $table->string('note', 1000);
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
        Schema::dropIfExists('tripNote');
    }
}
