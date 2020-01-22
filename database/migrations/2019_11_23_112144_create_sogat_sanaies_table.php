<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSogatSanaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sogatsanaies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('eatable')->default(0);
            $table->boolean('jewelry')->default(0);
            $table->boolean('cloth')->default(0);
            $table->boolean('decorative')->default(0);
            $table->boolean('applied')->default(0);
            $table->tinyInteger('style')->default(1);
            $table->tinyInteger('weight')->default(1);
            $table->tinyInteger('size')->default(1);
            $table->boolean('fragile')->default(0);
            $table->tinyInteger('price')->default(1);
            $table->boolean('torsh')->default(0);
            $table->boolean('shirin')->default(0);
            $table->boolean('talkh')->default(0);
            $table->boolean('malas')->default(0);
            $table->boolean('shor')->default(0);
            $table->boolean('tond')->default(0);
            $table->string('material')->nullable();
            $table->unsignedInteger('cityId');
            $table->string('mainPic')->nullable();
            $table->string('alt', 300);
            $table->text('description');
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
        Schema::dropIfExists('sogatsanaies');
    }
}
