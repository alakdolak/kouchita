<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivalContents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('festivalId');
            $table->unsignedInteger('userId');
            $table->string('title');
            $table->tinyInteger('isPic')->default(0);
            $table->tinyInteger('isVideo')->default(0);
            $table->string('description', 500)->nullable();
            $table->unsignedInteger('cityId');
            $table->unsignedInteger('kindPlaceId')->default(0);
            $table->unsignedInteger('placeId')->default(0);
            $table->string('content');
            $table->string('thumbnail', 100);
            $table->string('code', 10);
            $table->tinyInteger('confirm')->default(0);
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
        Schema::dropIfExists('festivalContents');
    }
}
