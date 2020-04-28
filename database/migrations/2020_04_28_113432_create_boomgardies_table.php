<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoomgardiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boomgardies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('slug');
            $table->text('address');
            $table->string('phone', 400)->nullable();
            $table->mediumText('description');
            $table->string('room_num');

            $table->string('file', 300);
            $table->unsignedInteger('cityId');
            $table->mediumText('C');
            $table->mediumText('D');
            $table->string('picNumber')->nullable();
            $table->string('alt', 300);
            $table->text('meta');
            $table->string('keyword', 300);
            $table->string('seoTitle', 300);
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
        Schema::dropIfExists('boomgardies');
    }
}
