<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporttours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->unsignedInteger('sTransportId');
            $table->unsignedInteger('eTransportId');
            $table->string('sTime', 30);
            $table->string('eTime', 30);
            $table->string('sDescription');
            $table->string('eDescription');
            $table->string('sAddress');
            $table->string('eAddress');
            $table->string('sLatLng');
            $table->string('eLatLng');

            $table->foreign('tourId')->references('id')->on('tour')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporttours');
    }
}
