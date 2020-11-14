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
            $table->string('phone', 100)->nullable();
            $table->unsignedInteger('cityId');
            $table->string('address', 400);
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->unsignedInteger('localShopGroupId')->default(0);
            $table->unsignedInteger('relatedPlaceId')->nullable();
            $table->string('relatedPlaceName', 200)->nullable();
            $table->tinyInteger('isBoarding')->default(0);
            $table->tinyInteger('afterClosedDayIsOpen')->default(1);
            $table->tinyInteger('closedDayIsOpen')->default(1);
            $table->string('inWeekOpenTime', 10)->nullable();
            $table->string('inWeekCloseTime', 10)->nullable();
            $table->string('afterClosedDayOpenTime', 10)->nullable();
            $table->string('afterClosedDayCloseTime', 10)->nullable();
            $table->string('closedDayOpenTime', 10)->nullable();
            $table->string('closedDayCloseTime', 10)->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->unsignedInteger('author');
            $table->tinyInteger('confirm')->default(1);
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
