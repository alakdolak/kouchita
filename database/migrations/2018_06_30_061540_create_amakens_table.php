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
            $table->string('alt1', 300)->nullable();
            $table->string('alt2', 300)->nullable();
            $table->string('alt3', 300)->nullable();
            $table->string('alt4', 300)->nullable();
            $table->string('alt5', 300)->nullable();
            $table->string('tag1', 300)->nullable();
            $table->string('tag2', 300)->nullable();
            $table->string('tag3', 300)->nullable();
            $table->string('tag4', 300)->nullable();
            $table->string('tag5', 300)->nullable();
            $table->string('tag6', 300)->nullable();
            $table->string('tag7', 300)->nullable();
            $table->string('tag8', 300)->nullable();
            $table->string('tag9', 300)->nullable();
            $table->string('tag10', 300)->nullable();
            $table->string('tag11', 300)->nullable();
            $table->string('tag12', 300)->nullable();
            $table->string('tag13', 300)->nullable();
            $table->string('tag14', 300)->nullable();
            $table->string('tag15', 300)->nullable();
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
