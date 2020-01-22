<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstelahatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estelahat', function (Blueprint $table) {
            $table->increments('id');
            $table->text('estelah');
            $table->text('talafoz');
            $table->text('maani');
            $table->unsignedInteger('goyeshId');
            $table->index('goyeshId');
            $table->unsignedInteger('tagId');
            $table->index('tagId');
            $table->foreign('goyeshId')->references('id')->on('goyeshCity')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('goyeshTag')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estelahat');
    }
}
