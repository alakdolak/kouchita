<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userAddPlaces', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('kindPlaceId');
            $table->string('name');
            $table->string('city');
            $table->string('stateId');
            $table->string('address', 300)->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone')->nullable();
            $table->string('fixPhone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('features')->nullable();
            $table->longText('pics')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('archive')->default(0);
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
        Schema::dropIfExists('user_add_places');
    }
}
