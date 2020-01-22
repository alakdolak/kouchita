<?php

use Illuminate\Database\Seeder;

class OpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `opinion` VALUES (1,4,'برخورد 
        کارکنان'),(2,4,'کیفیت غذا'),(3,4,'امکانات')");
    }
}
