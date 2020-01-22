<?php

use Illuminate\Database\Seeder;

class UserOpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `userOpinions` VALUES (1,6,5,1),(2,6,5,2),(3,6,5,3),(4,12,4,1),(5,12,4,2),(6,12,4,3),(7,23,4,1),(8,23,5,2),(9,23,4,3),(10,27,5,1),(11,27,5,2),(12,27,4,3),(13,39,3,1),(14,39,5,2),(15,39,2,3),(16,954,4,1),(17,954,4,2),(18,954,4,3)");
    }
}
