<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitationCode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phoneNum', 11);
            $table->unsignedInteger('uId');
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
        Schema::dropIfExists('invitationCode');
    }
}
