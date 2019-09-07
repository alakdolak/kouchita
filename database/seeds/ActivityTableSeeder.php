<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `activity` VALUES (1,'مشاهده',10,'','',0,0),(2,'امتیاز',10,'rate.svg','رای',1,0),(3,'نظرسنجی',50,'survey.png','نظرسنجی',1,0),(6,'نظر',10,'review.svg','نقد',1,1),(8,'سوال',5,'question.svg','سوال',1,1),(10,'پاسخ',10,'answer.svg','پاسخ به سوال',1,1),(13,'عکس',10,'photo.svg','عکس',1,1),(15,'نشانه گذاری',0,'icon_photos_green.png','',0,0),(16,'گزارش',0,'icon_photos_green.png','',0,0),(17,'دعوت',50,'icon_photos_green.png','دعوت',0,0),(18,'ویرایش',0,'icon_photos_green.png','ویرایش',0,1),(19,'افزودن',0,'icon_photos_green.png','افزودن',0,1),(20,'خرید',0,'icon_photos_green.png','خرید',0,0)");

        \Illuminate\Support\Facades\DB::insert("insert into activity VALUES (99, 'رای', 1, 'icon_photos_green.png', 
        'رای', 0, 1)");
    }

}
