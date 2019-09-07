<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->mediumText('description');
            $table->longText('dastoor');
            $table->string('mazze', 10)->nullable();
            $table->string('brand_name_1', 400);
            $table->longText('des_name_1');
            $table->string('brand_name_2', 400);
            $table->longText('des_name_2');
            $table->string('brand_name_3', 400);
            $table->longText('des_name_3');
            $table->string('brand_name_4', 400);
            $table->longText('des_name_4');
            $table->string('brand_name_5', 400);
            $table->longText('des_name_5');
            $table->string('brand_name_6', 400);
            $table->longText('des_name_6');
            $table->string('brand_name_7', 400);
            $table->longText('des_name_7');
            $table->integer('category');
            $table->string('pic_1', 100);
            $table->string('pic_2', 100);
            $table->string('pic_3', 100);
            $table->string('pic_4', 100);
            $table->string('pic_5', 100);
            $table->string('file', 300);
            $table->text('meta');
            $table->unsignedInteger('stateId');
            $table->index('stateId');
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
            $table->foreign('stateId')->references('id')->on('state')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adab');
    }
}
