<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `place` VALUES (1,'اماکن',1),(3,'رستوران',1),(4,'هتل',1),(6,'ماجرا',1),(7,'پیام',0),(8,'آداب',1),(9,'اصطلاخات',0)");
    }
}
