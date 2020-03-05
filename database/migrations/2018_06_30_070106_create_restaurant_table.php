<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->text('address');
            $table->string('phone', 400);
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
            $table->boolean('modern');
            $table->boolean('sonnati');
            $table->boolean('ghadimi');
            $table->boolean('mamooli');
            $table->integer('kind_id');
            $table->string('file', 300);
            $table->string('pic_1', 100);
            $table->string('pic_2', 100);
            $table->string('pic_3', 100);
            $table->string('pic_4', 100);
            $table->string('pic_5', 100);
            $table->text('meta');
            $table->unsignedInteger('cityId');
            $table->index('cityId');
            $table->mediumText('C');
            $table->mediumText('D');
            $table->string('site', 400);
            $table->string('keyword', 300);
            $table->string('h1', 300);
            $table->string('alt1', 300)->nullable();
            $table->string('alt2', 300)->nullable();
            $table->string('alt3', 300)->nullable();
            $table->string('alt4', 300)->nullable();
            $table->string('alt5', 300)->nullable();
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
        Schema::dropIfExists('restaurant');
    }
}
