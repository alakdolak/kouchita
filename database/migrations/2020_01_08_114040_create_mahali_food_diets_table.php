<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahaliFoodDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahaliFoodDiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('energy');
            $table->integer('volume');
            $table->boolean('gram');
            $table->boolean('spoon');
            $table->unsignedInteger('mahaliFoodId');

            $table->foreign('mahaliFoodId')->references('id')->on('mahalifood')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahaliFoodDiets');
    }
}
