<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserScrollLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userScrollLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId')->nullable();
            $table->string('userCode', 10)->nullable();
            $table->unsignedInteger('userSeenId');
            $table->text('scrollLog');
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
        Schema::dropIfExists('userScrollLogs');
    }
}
