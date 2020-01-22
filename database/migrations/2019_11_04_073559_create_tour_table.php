<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->string('name');
            $table->unsignedInteger('srcId');
            $table->unsignedInteger('destId');
            $table->tinyInteger('kindDest');
            $table->boolean('private');
            $table->string('bestSeason');
            $table->boolean('isTransport')->nullable();
            $table->string('inTransport')->nullable();
            $table->boolean('isMeal')->nullable();
            $table->boolean('isMealAllDay')->nullable();
            $table->boolean('isMealMoney')->nullable();
            $table->string('meals', 100)->nullable();
            $table->integer('minCost')->nullable();
            $table->boolean('isInsurance')->nullable();
            $table->tinyInteger('ticketKind')->nullable();
            $table->integer('maxCapacity')->nullable();
            $table->integer('minCapacity')->nullable();
            $table->tinyInteger('maxGroup')->nullable();
            $table->boolean('anyCapacity')->nullable();
            $table->tinyInteger('period')->nullable();
            $table->string('sDate')->nullable();
            $table->string('eDate')->nullable();
            $table->string('language')->nullable();
            $table->boolean('isTourGuide')->nullable();
            $table->boolean('isLocalTourGuide')->nullable();
            $table->boolean('isSpecialTourGuid')->nullable();
            $table->boolean('isTourGuidDefined')->nullable();
            $table->boolean('isTourGuideInKoochita')->nullable();
            $table->string('backupPhone')->nullable();
            $table->text('description')->nullable();
            $table->text('textExpectation')->nullable();
            $table->text('specialInformation')->nullable();
            $table->text('opinion')->nullable();
            $table->text('tourLimit')->nullable();
            $table->boolean('cancelAble')->nullable();
            $table->text('cancelDescription')->nullable();
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
        Schema::dropIfExists('tour');
    }
}
