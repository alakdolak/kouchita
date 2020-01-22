<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourFocusToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourfocus_tour', function (Blueprint $table) {
            $table->unsignedInteger('tourId');
            $table->unsignedInteger('focusId');

            $table->foreign('tourId')->references('id')->on('tour')->onUpdate('cascade')->onDelete('Cascade');
            $table->foreign('focusId')->references('id')->on('tourfocus')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_focus__tours');
    }
}
