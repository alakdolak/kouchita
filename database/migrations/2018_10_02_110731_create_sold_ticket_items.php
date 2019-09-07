<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldTicketItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldTicketItems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('direction', 100);
            $table->string('ageType', 10);
            $table->integer('value');
            $table->string('IDNumber', 100);
            $table->string('codeRef', 100)->nullabe();
            $table->unsignedInteger('soldTicketId');
            $table->foreign('soldTicketId')->references('id')->on('soldTicket')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soldTicketItems');
    }
}
