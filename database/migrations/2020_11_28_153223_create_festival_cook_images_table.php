<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalCookImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivalCookImages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('foodId')->nullable();
            $table->string('foodName')->nullable();
            $table->string('file');
            $table->string('thumbnail')->nullable();
            $table->string('type', 10)->default('image');
            $table->tinyInteger('confirm')->default(0);
            $table->tinyInteger('isLimbo')->default(1);
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
        Schema::dropIfExists('festival_cook_images');
    }
}
