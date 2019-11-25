<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placepics', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('picNumber');
            $table->unsignedInteger('placeId');
            $table->unsignedInteger('kindPlaceId');
            $table->string('alt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placepics');
    }
}
