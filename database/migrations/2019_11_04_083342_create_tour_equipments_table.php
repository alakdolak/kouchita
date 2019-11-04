<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourequipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tourId');
            $table->unsignedInteger('subEquipmentId');
            $table->boolean('isNecessary')->default(false);

            $table->foreign('tourId')->references('id')->on('tour')->onUpdate('cascade')->onDelete('Cascade');
            $table->foreign('subEquipmentId')->references('id')->on('subequipments')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourequipments');
    }
}
