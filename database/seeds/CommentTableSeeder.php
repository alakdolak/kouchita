<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO admin_shazde.comment (id, logId, placeStyleId, src, seasonTrip, status) VALUES (1, 8, 3, 'تهران', 2, 1),
(2, 14, 3, 'تهران', 3, 1),
(3, 24, 2, 'تهران', 1, 1),
(4, 28, 2, 'تهران', 2, 1),
(5, 41, 2, 'تهران', 3, 1);");
    }
}
