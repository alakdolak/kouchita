<?php

use Illuminate\Database\Seeder;

class TourTablesSeeder extends Seeder
{
    public function run()
    {
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tourdifficults` (`id`, `name`, `icon`, `alone`, `description`) VALUES (1, 'آسان', '\\E0EC', '1', NULL), (2, 'سبک', '\\E0ED', '1', NULL), (3, 'پرتحرک', '\\E0F4', '1', NULL), (4, 'سخت', '\\E0F5', '1', NULL), (5, 'تخصصی', '\\E0EB', '1', NULL), (6, 'نابینایان', '\\E0F6', '0', NULL), (7, 'توانیابان', '\\E0F8', '1', NULL), (8, 'دانش‌آموزان', '\\E0EC', '0', NULL);");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tourfocus` (`id`, `name`) VALUES (1, 'فرهنگی'), (2, 'تاریخی'), (3, 'خرید'), (4, 'غذا'), (5, 'پیاده‌روی'), (6, 'مردم‌شناسی'), (7, 'موزه'), (8, 'فیلم'), (9, 'شبانه'), (10, 'جشنواره');");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tourkind` (`id`, `name`, `icon`, `description`) VALUES ('1', 'شهرگردی', '\\E0E0', NULL), ('2', 'طبیعت گردی', '\\E0E1', NULL), ('3', 'روستا گردی', '\\E0E2', NULL), ('4', 'ماجراجویی', '\\E0E3', NULL), ('5', 'سلامت', '\\E0E4', NULL), ('6', 'تفریحی', '\\E0E5', NULL), ('7', 'هنری', '\\E0E6', NULL), ('8', 'ورزشی', '\\E0E7', NULL), ('9', 'علمی', '\\E0E8', NULL), ('10', 'فرهنگی', '\\E0E9', NULL), ('11', 'تخصصی', '\\E0EA', NULL);");
        \Illuminate\Support\Facades\DB::insert("INSERT INTO `tourstyles` (`id`, `name`) VALUES ('1', 'جوانانه'), ('2', 'گروهی'), ('3', 'دو نفره'), ('4', 'بازی'), ('5', 'خانوادگی'), ('6', 'با بچه'), ('7', 'اقتصادی'), ('8', 'آب و هوای خاص'), ('9', 'ماجراجوی'), ('10', 'ماه عسل');");
    }
}
