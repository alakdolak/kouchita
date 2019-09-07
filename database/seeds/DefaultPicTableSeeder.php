<?php

use Illuminate\Database\Seeder;

class DefaultPicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `defaultPic` VALUES (1,'1.jpg'),(10,'10.jpg'),(11,'11.jpg'),(12,'12.jpg'),(13,'13.jpg'),(14,'14.jpg'),(15,'15.jpg'),(16,'16.jpg'),(17,'17.jpg'),(18,'18.jpg'),(19,'19.jpg'),(2,'2.jpg'),(20,'20.jpg'),(21,'21.jpg'),(3,'3.jpg'),(4,'4.jpg'),(5,'5.jpg'),(6,'6.jpg'),(7,'7.jpg'),(8,'8.jpg'),(9,'9.jpg')");
    }
}
