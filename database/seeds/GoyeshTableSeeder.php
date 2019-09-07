<?php

use Illuminate\Database\Seeder;

class GoyeshTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `goyeshCity` VALUES (1,'فارسی')");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `goyeshTag` VALUES (1,'احوال پرسی')");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `estelahat` VALUES (3,'سلام','salam','سلام',1,1)");
    }
}
