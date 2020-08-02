<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafarnamehPlaceRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safarnamehPlaceRelations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('safarnamehId');
            $table->unsignedInteger('kindPlaceId');
            $table->unsignedInteger('placeId');
            $table->string('kind', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safarnamehPlaceRelations');
    }
}
