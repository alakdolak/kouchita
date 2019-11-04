<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourdiscounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->integer('discount');
            $table->tinyInteger('minCount')->nullable();
            $table->tinyInteger('maxCount')->nullable();
            $table->boolean('isChildren')->nullable();
            $table->boolean('isReason')->nullable();
            $table->string('sReasonDate')->nullable();
            $table->string('eReasonDate')->nullable();
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
        Schema::dropIfExists('tourdiscounts');
    }
}
