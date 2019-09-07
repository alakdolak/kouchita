<?php

use Illuminate\Database\Seeder;

class TripStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tripStyle` VALUES (10,'اقتصادی'),(12,'اهل خرید'),(11,'اهل طبیعت'),(9,'اهل غذا'),(2,'با دوستان'),(22,'با دوچرخه'),(1,'تنها'),(13,'جاهای بکر'),(19,'جنگل'),(17,'جهان گرد'),(7,'خانوادگی'),(18,'دریا'),(8,'روستاگرد'),(16,'زیارت'),(20,'شهر'),(14,'صحرا'),(4,'لوکس'),(6,'ماجراجو'),(21,'کافه نشین'),(15,'کوه نورد')");
    }
}
