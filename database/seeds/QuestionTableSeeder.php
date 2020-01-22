<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `questions` VALUES (1,'آیا از این هتل راضی بودید؟',4),(3,'از سایت ما خوشت اومد؟',4)");
    }
}
