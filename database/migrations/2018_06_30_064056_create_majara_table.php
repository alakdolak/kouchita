<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMajaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majara', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->boolean('manategh');
            $table->boolean('kooh');
            $table->boolean('darya');
            $table->boolean('daryache');
            $table->boolean('hayatevahsh');
            $table->boolean('shahri');
            $table->boolean('hefazat');
            $table->boolean('kavir');
            $table->boolean('raml');
            $table->boolean('jangal');
            $table->boolean('kamp');
            $table->boolean('koohnavardi');
            $table->boolean('sahranavardi');
            $table->boolean('abshar');
            $table->boolean('darre');
            $table->boolean('piknik');
            $table->boolean('bekr');
            $table->boolean('dasht');
            $table->mediumText('dastresi');
            $table->string('nazdik', 500);
            $table->integer('class');
            $table->mediumText('description');
            $table->string('pic_1', 100);
            $table->string('pic_2', 100);
            $table->string('pic_3', 100);
            $table->string('pic_4', 100);
            $table->string('pic_5', 100);
            $table->string('file', 300);
            $table->text('meta');
            $table->unsignedInteger('cityId');
            $table->index('cityId');
            $table->mediumText('C');
            $table->mediumText('D');
            $table->string('keyword', 300);
            $table->string('h1', 300);
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
        Schema::dropIfExists('majara');
    }
}
