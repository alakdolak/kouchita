<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userOpinions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logId');
            $table->index('logId');
            $table->integer('rate');
            $table->unsignedInteger('opinionId');
            $table->index('opinionId');
            $table->foreign('logId')->references('id')->on('log')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('opinionId')->references('id')->on('opinion')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userOpinions');
    }
}
