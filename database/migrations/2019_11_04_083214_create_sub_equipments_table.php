<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subequipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipmentId');
            $table->string('name');

            $table->foreign('equipmentId')->references('id')->on('mainequipments')->onUpdate('cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subequipments');
    }
}
