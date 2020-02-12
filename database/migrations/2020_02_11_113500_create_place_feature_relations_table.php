<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceFeatureRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeFeatureRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('placeId');
            $table->unsignedInteger('featureId');
            $table->string('ans')->nullable();

            $table->foreign('featureId')->references('id')->on('placeFeatures')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeFeatureRelations');
    }
}
