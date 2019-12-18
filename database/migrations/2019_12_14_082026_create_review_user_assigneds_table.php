<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewUserAssignedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewUserAssigned', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId')->nullable();
            $table->string('email');
            $table->unsignedInteger('logId');

            $table->foreign('logId')->references('id')->on('log')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviewUserAssigned');
    }
}
