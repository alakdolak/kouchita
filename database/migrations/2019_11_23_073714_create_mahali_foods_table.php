<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahaliFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahaliFood', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('hotOrCold');
            $table->text('material')->nullable();
            $table->string('recipes', 1000)->nullable();
            $table->boolean('vegetarian');
            $table->boolean('vegan');
            $table->boolean('diabet');
            $table->tinyInteger('kind');
            $table->unsignedInteger('cityId');
            $table->string('mainPic')->nullable();
            $table->string('alt', 300);
            $table->string('keyword', 300);
            $table->string('h1', 300);
            $table->string('meta', 300);
            $table->unsignedInteger('author');
            $table->tinyInteger('authorized')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahalifood');
    }
}
