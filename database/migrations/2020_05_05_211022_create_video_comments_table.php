<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoComments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('videoId');
            $table->unsignedInteger('parent')->nullable();
            $table->string('comment');
            $table->tinyInteger('haveAns')->nullable();
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
        Schema::dropIfExists('videoComments');
    }
}
