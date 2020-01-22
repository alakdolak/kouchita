<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('placeId');
            $table->unsignedInteger('kindPlaceId');
            $table->unsignedInteger('visitorId');
            $table->index('placeId');
            $table->index('kindPlaceId');
            $table->index('visitorId');
            $table->date('date');
            $table->unsignedInteger('activityId');
            $table->index('activityId');
            $table->text('text');
            $table->string('pic', 50);
            $table->integer('time');
            $table->string('subject', 40);
            $table->unsignedInteger('relatedTo')->default(0);
            $table->boolean('confirm');
            $table->boolean('seen');
            $table->foreign('visitorId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activityId')->references('id')->on('activity')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
