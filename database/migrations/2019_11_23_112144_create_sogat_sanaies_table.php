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
