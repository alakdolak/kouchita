<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCityRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postCityRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('postId');
            $table->unsignedInteger('stateId');
            $table->unsignedInteger('cityId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postCityRelations');
    }
}
