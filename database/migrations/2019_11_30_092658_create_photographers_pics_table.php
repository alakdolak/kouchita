<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotographersPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographersPics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->string('pic');
            $table->string('name');
            $table->unsignedInteger('kindPlaceId');
            $table->unsignedInteger('placeId');
            $table->string('alt', 20);
            $table->string('description', 120)->nullable();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->boolean('isSitePic')->default(0);
            $table->boolean('isPostPic')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photographersPics');
    }
}
