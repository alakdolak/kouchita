<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postCommentLikes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('commentId');
            $table->unsignedInteger('userId');
            $table->tinyInteger('like');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postCommentLikes');
    }
}
