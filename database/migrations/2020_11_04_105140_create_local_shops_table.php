<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localShops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId')->nullable();
            $table->unsignedInteger('categoryId')->nullable();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('address', 400);
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->unsignedInteger('localShopGroupId')->default(0);
            $table->unsignedInteger('author');
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
        Schema::dropIfExists('localShops');
    }
}
