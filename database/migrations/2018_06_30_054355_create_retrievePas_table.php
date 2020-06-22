<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetrievePasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retrievePas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uId');
            $table->string('email', 100);
            $table->string('code', 30);
            $table->string('sendTime', 16);
            $table->index('uId');
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retrievePas');
    }
}
