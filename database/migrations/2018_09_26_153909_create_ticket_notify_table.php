<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketNotify', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('from', 10);
            $table->string('to', 10);
            $table->string('date', 8);
            $table->unique(['from', 'email', 'date', 'to']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketNotify');
    }
}
