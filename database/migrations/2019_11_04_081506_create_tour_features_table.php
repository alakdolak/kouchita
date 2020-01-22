<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourfeatures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->string('name', 30);
            $table->string('description');
            $table->string('group',10);
            $table->integer('cost');

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
        Schema::dropIfExists('tourfeatures');
    }
}
