<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activityLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('referenceId')->nullable();
            $table->unsignedInteger('activityId');
            $table->integer('kindPlaceId')->default(-1);
            $table->timestamps();
        });

        Schema::table('activityLogs', function(Blueprint $table){
           $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('activityId')->references('id')->on('activity')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
