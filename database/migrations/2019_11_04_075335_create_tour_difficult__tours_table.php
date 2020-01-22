<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDifficultToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourdifficult_tours', function (Blueprint $table) {
            $table->unsignedInteger('tourId');
            $table->unsignedInteger('difficultId');

            $table->foreign('tourId')->references('id')->on('tour')->onUpdate('cascade')->onDelete('Cascade');
            $table->foreign('difficultId')->references('id')->on('tourdifficults')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourdifficult_tours');
    }
}
