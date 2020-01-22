<?php

use Illuminate\Database\Seeder;

class PlaceStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `placeStyle` VALUES (2,'مجردی',4),(3,'متاهلی',4)");
    }
}
