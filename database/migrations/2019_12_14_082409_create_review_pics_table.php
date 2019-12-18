<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewPics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pic');
            $table->string('code', 10);
            $table->unsignedInteger('logId')->nullable();
            $table->boolean('isVideo')->default(0);
            $table->boolean('is360')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviewPics');
    }
}
