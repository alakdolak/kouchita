<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpOnActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opOnActivity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logId');
            $table->index('logId');
            $table->unsignedInteger('uId');
            $table->index('uId');
            $table->boolean('like_');
            $table->boolean('dislike');
            $table->boolean('seen');
            $table->string('time', 16)->nullable();
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('opOnActivity');
    }
}
