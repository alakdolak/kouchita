<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoLives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('userId');
            $table->string('description')->nullable();
            $table->string('code');
            $table->string('sTime');
            $table->string('sDate');
            $table->tinyInteger('isLive')->default(1);
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
        Schema::dropIfExists('videoLives');
    }
}
