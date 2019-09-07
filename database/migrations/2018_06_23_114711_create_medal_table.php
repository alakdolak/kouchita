<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->unsignedInteger('activityId');
            $table->integer('floor');
            $table->string('pic_1', 400);
            $table->string('pic_2', 400);
            $table->integer('kindPlaceId');
            $table->index('kindPlaceId');
            $table->index('activityId');
            $table->foreign('activityId')->references('id')->on('activity')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medal');
    }
}
