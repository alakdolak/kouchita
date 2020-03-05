<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->text('address');
            $table->string('phone', 400);
            $table->string('site', 400);
            $table->mediumText('description');
            $table->boolean('food_irani');
            $table->boolean('food_mahali');
            $table->boolean('food_farangi');
            $table->boolean('coffeeshop');
            $table->boolean('tarikhi');
            $table->boolean('markaz');
            $table->boolean('hoome');
            $table->boolean('shologh');
            $table->boolean('khalvat');
            $table->boolean('tabiat');
            $table->boolean('kooh');
            $table->boolean('darya');
            $table->integer('class');
            $table->string('vabastegi', 500);
            $table->boolean('parking');
            $table->boolean('club');
            $table->boolean('pool');
            $table->boolean('tahviye');
            $table->boolean('maalool');
            $table->boolean('internet');
            $table->boolean('anten');
            $table->boolean('breakfast');
            $table->boolean('restaurant');
            $table->boolean('swite');
            $table->boolean('masazh');
            $table->boolean('mahali');
            $table->string('rate', 100);
            $table->integer('room_num');
            $table->boolean('modern');
            $table->boolean('sonnati');
            $table->boolean('ghadimi');
            $table->boolean('mamooli');
            $table->boolean('laundry');
            $table->boolean('gasht');
            $table->boolean('safe_box');
            $table->boolean('shop');
            $table->boolean('roof_garden');
            $table->boolean('game_net');
            $table->boolean('confrenss_room');
            $table->string('pic_1', 100);
            $table->string('pic_2', 100);
            $table->string('pic_3', 100);
            $table->string('pic_4', 100);
            $table->string('pic_5', 100);
            $table->integer('kind_id');
            $table->string('file', 300);
            $table->text('meta');
            $table->unsignedInteger('cityId');
            $table->index('cityId');
            $table->mediumText('C');
            $table->mediumText('D');
            $table->string('fasele', 400);
            $table->integer('rate_int');
            $table->string('keyword', 300);
            $table->string('h2', 300);
            $table->text('reserveId')->default('0');
            $table->foreign('cityId')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
