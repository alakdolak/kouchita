<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoLiveChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoLiveChats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('videoId');
            $table->string('username');
            $table->string('userPic', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videoLiveChats');
    }
}
