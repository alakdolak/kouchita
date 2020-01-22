<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOffCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offCode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->unique();
            $table->integer('amount');
            $table->boolean('kind')->default(0);
            $table->string('expire', 8);
            $table->unsignedInteger('uId');
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
        Schema::dropIfExists('offCode');
    }
}
