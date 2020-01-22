<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionPublicityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionPublicity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('publicityId');
            $table->index('publicityId');
            $table->unsignedInteger('sectionId');
            $table->index('sectionId');
            $table->integer('part');
            $table->foreign('sectionId')->references('id')->on('section')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('publicityId')->references('id')->on('publicity')->onUpdate('cascade')->onDelete
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
        Schema::dropIfExists('sectionPublicity');
    }
}
