<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewFeedBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewFeedBack', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('logId');
            $table->unsignedInteger('userId');
            $table->boolean('like');// 1 like , -1 dislike
            $table->timestamps();

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
        Schema::dropIfExists('reviewFeedBack');
    }
}
