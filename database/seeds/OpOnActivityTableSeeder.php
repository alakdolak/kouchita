<?php

use Illuminate\Database\Seeder;

class OpOnActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `opOnActivity` VALUES (1,8,20,1,0,1,NULL),(2,8,24,1,0,1,NULL),(3,28,3,1,0,1,NULL),(4,293,20,1,0,1,NULL),(5,8,45,0,1,1,NULL),(6,41,3,1,0,1,'1527933463')");
    }
}
