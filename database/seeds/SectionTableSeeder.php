<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `section` VALUES (2,'hotel-list'),(3,'hotel-detail')");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `sectionPublicity` VALUES (4,9,2,5),(5,9,3,1)");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `statePublicity` VALUES (27,3,9)");
    }
}
