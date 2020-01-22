<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('companyId');
            $table->index('companyId');
            $table->string('url', 300);
            $table->string('pic', 100);
            $table->string('from_', 8);
            $table->string('to_', 8);
            $table->unique('pic');
            $table->foreign('companyId')->references('id')->on('company')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicity');
    }
}
