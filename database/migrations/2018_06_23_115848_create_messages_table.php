<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->unsignedInteger('senderId');
            $table->unsignedInteger('receiverId');
            $table->longText('message');
            $table->increments('id');
            $table->string('date', 8);
            $table->string('subject', 40);
            $table->boolean('receiverShow')->default(true);
            $table->boolean('senderShow')->default(true);
            $table->boolean('seenReceiver')->default(true);
            $table->boolean('seenSender')->default(true);
            $table->index('senderId');
            $table->index('ReceiverId');
            $table->foreign('senderId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ReceiverId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
