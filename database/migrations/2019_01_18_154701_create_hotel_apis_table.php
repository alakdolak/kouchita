<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_apis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('facility')->nullable();
            $table->string('rph')->nullable();
            $table->string('userName')->nullable();
            $table->text('room_facility')->nullable();
            $table->string('policy')->nullable();
            $table->string('cityName')->nullable();
            $table->string('provider')->nullable();
            $table->integer('money')->nullable();
            $table->integer('offer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_apis');
    }
}
