<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoryRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postCategoryRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('postId');
            $table->unsignedInteger('categoryId');
            $table->boolean('isPlaceCategory')->default(0);
            $table->boolean('isMain')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postCategoryRelations');
    }
}
