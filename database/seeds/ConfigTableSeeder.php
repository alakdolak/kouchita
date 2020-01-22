<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PlaceTableSeeder::class);
        $this->call(PlaceStyleTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(AgeTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AirLineTableSeeder::class);
        $this->call(TrainTableSeeder::class);
        $this->call(MedalTableSeeder::class);
        $this->call(OpinionTableSeeder::class);
        $this->call(PicItemsTableSeeder::class);
        $this->call(PublicityTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(ReportsTypeTableSeeder::class);
        $this->call(TripStyleTableSeeder::class);
        $this->call(DefaultPicTableSeeder::class);

        \Illuminate\Support\Facades\DB::insert("INSERT INTO `config` VALUES (1,200,9)");
    }
}
