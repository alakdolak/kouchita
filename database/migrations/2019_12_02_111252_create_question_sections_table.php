<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionSections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('questionId');
            $table->unsignedInteger('kindPlaceId');
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
        Schema::dropIfExists('questionSections');
    }
}
