<?php

use Illuminate\Database\Seeder;

class PicItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `picItems` VALUES (1,4,'اتاق ها'),(2,4,'پذیرش'),(3,1,'الکی 1'),(4,1,'الکی 2'),(5,3,'غذا'),(6,3,'محیط')");
    }
}
