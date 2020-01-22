<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInnerFlightTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innerFlightTicket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_at', 100);
            $table->string('updated_at', 100);
            $table->integer('price');
            $table->integer('maxPrice')->nullable();
            $table->integer('childPrice')->nullable();
            $table->integer('infantPrice')->nullable();
            $table->string('date', 8);
            $table->string('time', 6);
            $table->boolean('isCharter')->default(0);
            $table->string('arrivalTime', 6)->nullable();
            $table->boolean('isIncreasable')->default(0);
            $table->string('flightId');
            $table->string('line');
            $table->integer('free');
            $table->string('from', 10);
            $table->string('to', 10);
            $table->string('lineEn', 10)->nullable();
            $table->string('lineCode', 10)->nullable();
            $table->string('lineLogo', 100)->nullable();
            $table->string('lineLogoSmall', 100)->nullable();
            $table->string('uniqueKey')->nullable();
            $table->boolean('isBusiness')->default(1);
            $table->integer('noTicket')->nullable();
            $table->string('provider', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('innerFlightTicket');
    }
}
