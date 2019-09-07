<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logId');
            $table->index('logId');
            $table->unsignedInteger('placeStyleId');
            $table->index('placeStyleId');
            $table->string('src', 40);
            $table->integer('seasonTrip');
            $table->boolean('status');
            $table->foreign('logId')->references('id')->on('log')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('placeStyleId')->references('id')->on('placeStyle')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
