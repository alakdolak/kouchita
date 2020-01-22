<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainSliderPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainSliderPic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pic');
            $table->string('alt');
            $table->string('text');
            $table->string('textColor');
            $table->string('textBackground');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainSliderPic');
    }
}
