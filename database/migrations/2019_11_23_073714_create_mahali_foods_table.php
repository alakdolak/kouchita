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
        Schema::create('mahalifood', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('hotOrCold');
            $table->text('material')->nullable();
            $table->string('recipes', 1000)->nullable();
            $table->boolean('veg');
            $table->tinyInteger('kind');
            $table->unsignedInteger('cityId');
            $table->string('mainPic')->nullable();
            $table->string('alt', 300);
            $table->string('keyword', 300);
            $table->string('h1', 300);
            $table->string('meta', 300);
            $table->string('tag1', 300)->nullable();
            $table->string('tag2', 300)->nullable();
            $table->string('tag3', 300)->nullable();
            $table->string('tag4', 300)->nullable();
            $table->string('tag5', 300)->nullable();
            $table->string('tag6', 300)->nullable();
            $table->string('tag7', 300)->nullable();
            $table->string('tag8', 300)->nullable();
            $table->string('tag9', 300)->nullable();
            $table->string('tag10', 300)->nullable();
            $table->string('tag11', 300)->nullable();
            $table->string('tag12', 300)->nullable();
            $table->string('tag13', 300)->nullable();
            $table->string('tag14', 300)->nullable();
            $table->string('tag15', 300)->nullable();
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
