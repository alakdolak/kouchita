<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nameFa", 100);
            $table->string("nameEn", 100);
            $table->string("familyFa", 100);
            $table->string("familyEn", 100);
            $table->string("birthDay", 8);
            $table->string("NID", 20)->unique();
            $table->boolean("NIDType")->default(1);
            $table->boolean("sex")->default(0);
            $table->boolean("self")->default(0);
            $table->string("expire", 8)->nullable();
            $table->smallInteger('ageType')->default(1);
            $table->unsignedInteger("countryCodeId");
            $table->unsignedInteger("uId");
            $table->foreign('countryCodeId')->references('id')->on('countryCode')->onUpdate('cascade')->onDelete
            ('restrict');
            $table->foreign('uId')->references('id')->on('users')->onUpdate('cascade')->onDelete
            ('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passenger');
    }
}
