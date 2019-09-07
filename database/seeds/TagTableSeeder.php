<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tag` VALUES (3,'هتل زیبا',2),(4,'استخر',2),(5,'کافی شاپ',2),(6,'iptv',2),(11,'مینی بار',4),(14,'وای فای',4),(15,'ایرانی',3),(16,'فرنگی',3),(17,'sddas',3)");
    }
}
