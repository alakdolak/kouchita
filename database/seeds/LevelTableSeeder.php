<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `level` VALUES (1,'2',500),(3,'3',1000),(4,'1',300),(5,'0',0),(6,'7',20000),(7,'4',2500),(8,'5',5000),(9,'6',10000)");
    }
}
