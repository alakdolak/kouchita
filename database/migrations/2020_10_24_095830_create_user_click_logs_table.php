<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserClickLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userClickLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId')->nullable();
            $table->string('userCode', 10)->nullable();
            $table->string('url', 300);
            $table->string('clickButton');
            $table->string('date', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userClickLogs');
    }
}
