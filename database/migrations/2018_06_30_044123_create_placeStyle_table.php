<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeStyle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->unique('name');
            $table->unsignedInteger('kindPlaceId');
            $table->index('kindPlaceId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeStyle');
    }
}
