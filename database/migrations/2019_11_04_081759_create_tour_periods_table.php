<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourperiods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->string('periodTime')->nullable();
            $table->string('sDate')->nullable();
            $table->string('eDate')->nullable();
            $table->foreign('tourId')->references('id')->on('tour')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourperiods');
    }
}
