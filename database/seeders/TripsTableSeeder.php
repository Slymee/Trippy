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

        for($i = 0; $i < 4; ++$i){
            $trip = Trip::create(
                [
                    'user_id' => 1,
                    'trip_name' => $faker->word,
                    'trip_description' => $faker->sentence,
                    'start_date' => now()->addDays(5),
                    'end_date' => now()->addDays(rand(8,11)),
                    'arrival_time' => $faker->dateTimeBetween('now', '+1 hour')->format('g:i A'),
                    'trip_price' => rand(300, 5000),
                    'means_of_transport' => 'Car',
                ]
            );

            $stopOvers = [
                '27.717245, 85.323959',
                '27.717245, 85.323959',
                '27.717245, 85.323959',
            ];
            
            foreach($stopOvers as $location){
                $trip->stopOvers()->create([
                    'location' => $location
                ]);
            }
        }
    }
}
