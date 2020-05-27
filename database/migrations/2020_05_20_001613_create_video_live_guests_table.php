<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoLiveGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoLiveGuests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('videoId');
            $table->string('name');
            $table->string('action');
            $table->mediumText('text');
            $table->string('pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videoLiveGuests');
    }
}
