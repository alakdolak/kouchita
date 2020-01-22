<?php

use Illuminate\Database\Seeder;

class PublicityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT into company VALUES (1, 'جاباما')");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `publicity` VALUES (9,1,'http://google.com','5.png','13970217','13970319')");
    }
}
