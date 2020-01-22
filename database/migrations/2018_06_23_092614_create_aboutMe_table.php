<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutMeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutMe', function (Blueprint $table) {
            $table->increments('id');
            $table->text('introduction');
            $table->unsignedInteger('ageId');
            $table->boolean('sex');
            $table->unsignedInteger('uId');
            $table->index(['uId']);
            $table->index(['ageId']);
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ageId')->references('id')->on('ages')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutMe');
    }
}
