<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialAdviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialAdvice', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('placeId');
            $table->index('placeId');
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
        Schema::dropIfExists('specialAdvice');
    }
}
