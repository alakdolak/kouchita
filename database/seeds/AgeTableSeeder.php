<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `ages` VALUES (3,'18-24'),(11,'29 - 25'),(12,'35 - 30'),(13,'40 - 35'),(14,'50 - 40'),(15,'60 - 50'),(10,'60 به بالا'),(2,'زیر 18')");
    }
}
