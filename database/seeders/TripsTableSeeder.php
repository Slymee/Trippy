<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use Faker\Factory;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; ++$i){
            Trip::create(
                [
                    'user_id' => 1,
                    'trip_name' => $faker->word,
                    'trip_description' => $faker->sentence,
                    'start_date' => now()->addDays(5),
                    'end_date' => now()->addDays(rand(8,11)),
                    'arrival_place' => $faker->streetAddress .', '. $faker->city,
                    'arrival_date_time' => now()->addDays(5)->format('Y-m-d H:i:s'),
                    'trip_price' => rand(300, 5000),
                ]
            );
        }
    }
}
