<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'trip_id' => 1,
                'destination_name' => 'Chitwan',
                'latitude' => 27.6833,
                'longitude' => 84.4167,
            ],

            [
                'trip_id' => 2,
                'destination_name' => 'Janakpur',
                'latitude' => 26.72882,
                'longitude' => 85.92628,
            ],

            [
                'trip_id' => 3,
                'destination_name' => 'Kalinchowk',
                'latitude' => 27.7482,
                'longitude' => 86.0351,
            ],

            [
                'trip_id' => 4,
                'destination_name' => 'Bandipur',
                'latitude' => 27.9170,
                'longitude' => 84.4068,
            ],

            [
                'trip_id' => 5,
                'destination_name' => 'Lumbini',
                'latitude' => 27.4500,
                'longitude' => 83.2500,
            ],

            [
                'trip_id' => 6,
                'destination_name' => 'Mustang',
                'latitude' => 28.9985,
                'longitude' => 83.8473,
            ],

            [
                'trip_id' => 7,
                'destination_name' => 'Gosaikunda',
                'latitude' => 28.0820,
                'longitude' => 85.4150,
            ],

            [
                'trip_id' => 8,
                'destination_name' => 'Daaman',
                'latitude' => 27.6158,
                'longitude' => 85.0961,
            ],

            [
                'trip_id' => 9,
                'destination_name' => 'Halesi',
                'latitude' => 27.1846,
                'longitude' => 86.5938,
            ],

            [
                'trip_id' => 10,
                'destination_name' => 'Karnali',
                'latitude' => 29.3863,
                'longitude' => 82.3886,
            ],
        ];

        foreach($datas as $data){
            Destination::create($data);
        }
    }
}
