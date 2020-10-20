<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodMaterialRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodMaterialRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('foodMaterialId');
            $table->unsignedInteger('mahaliFoodId');
            $table->string('volume', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodMaterialRelations');
    }
}
