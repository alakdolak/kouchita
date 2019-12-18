<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionUserAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionUserAns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logId');
            $table->unsignedInteger('questionId');
            $table->string('ans');

            $table->foreign('logId')->references('id')->on('log')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('questionId')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionUserAns');
    }
}
