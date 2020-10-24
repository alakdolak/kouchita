<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSeenLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userSeenLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId')->nullable();
            $table->string('userCode', 10)->nullable();
            $table->string('url', 300);
            $table->integer('seenTime')->default(0);
            $table->string('date', 15);
            $table->unsignedInteger('relatedId')->default(0);
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
        Schema::dropIfExists('userSeenLogs');
    }
}
