<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourCancelInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourcancelinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->text('text');
            $table->integer('percentBack');
            $table->string('dayOrHour');
            $table->tinyInteger('number');

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
        Schema::dropIfExists('tourcancelinfos');
    }
}
