<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amaken', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->text('address');
            $table->string('phone', 400);
            $table->string('site', 400);
            $table->mediumText('description');
            $table->string('emkanat', 500);
            $table->boolean('tarikhi');
            $table->boolean('mooze');
            $table->boolean('tafrihi');
            $table->boolean('tabiatgardi');
            $table->boolean('markazkharid');
            $table->boolean('baftetarikhi');
            $table->boolean('markaz');
            $table->boolean('hoome');
            $table->boolean('shologh');
            $table->boolean('khalvat');
            $table->boolean('tabiat');
            $table->boolean('kooh');
            $table->boolean('darya');
            $table->integer('class');
            $table->boolean('modern');
            $table->boolean('tarikhibana');
            $table->boolean('mamooli');
            $table->string('file', 400);
            $table->string('pic_1', 400);
            $table->string('pic_2', 400);
            $table->string('pic_3', 400);
            $table->string('pic_4', 400);
            $table->string('pic_5', 400);
            $table->text('meta');
            $table->unsignedInteger('cityId');
            $table->index('cityId');
            $table->mediumText('C');
            $table->mediumText('D');
            $table->boolean('farhangi');
            $table->boolean('ghadimi');
            $table->string('keyword', 300);
            $table->string('h2', 300);
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
        Schema::dropIfExists('amakens');
    }
}
