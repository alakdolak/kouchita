<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatePublicityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statePublicity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stateId');
            $table->index('stateId');
            $table->unsignedInteger('publicityId');
            $table->index('publicityId');
            $table->foreign('publicityId')->references('id')->on('publicity')->onUpdate('cascade')->onDelete
            ('restrict');
            $table->foreign('stateId')->references('id')->on('state')->onUpdate('cascade')->onDelete
            ('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statePublicity');
    }
}
