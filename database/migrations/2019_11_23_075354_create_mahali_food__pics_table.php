<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahaliFoodPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahaliFoodPics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('foodId');
            $table->string('pic');
            $table->string('alt', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahaliFoodPics');
    }
}
