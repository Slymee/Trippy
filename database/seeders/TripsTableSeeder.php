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

        // for($i = 0; $i < 4; ++$i){
        //     $trip = Trip::create(
        //         [
        //             'user_id' => 1,
        //             'trip_name' => $faker->word,
        //             'trip_description' => $faker->sentence,
        //             'start_date' => now()->addDays(5),
        //             'end_date' => now()->addDays(rand(8,11)),
        //             'arrival_time' => (string) $faker->dateTimeBetween('now', '+1 hour')->format('g:i A'),
        //             'trip_price' => rand(300, 5000),
        //             'means_of_transport' => 'Car',
        //         ]
        //     );

        //     $stopOvers = [
        //         '27.717245, 85.323959',
        //         '27.717245, 85.323959',
        //         '27.717245, 85.323959',
        //     ];

        //     foreach($stopOvers as $location){
        //         $trip->stopOvers()->create([
        //             'location' => $location
        //         ]);
        //     }
        // }

        $trips = [
            [
                'trip_name' => 'Kathmandu to Pokhara',
                'trip_description' => 'A scenic drive from Kathmandu to Pokhara',
                'trip_type' => 'Road Trip',
                'trip_price' => 5000,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-03',
                'arrival_time' => '10:00 AM',
                'means_of_transport' => 'Private Car',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '28.2123, 83.9856',
                'end_loc_name' => 'Pokhara',
                'location' => [
                    '27.7583, 85.3903', // Nagarkot
                    '27.9344, 85.2363', // Dhulikhel
                    '27.8469, 84.9263', // Bhaktapur
                    '27.8833, 84.8333' // Malekhu
                ]
            ],
            [
                'trip_name' => 'Chitwan to Lumbini',
                'trip_description' => 'A cultural tour from Chitwan to Lumbini',
                'trip_type' => 'Cultural Tour',
                'trip_price' => 3000,
                'start_date' => '2024-03-05',
                'end_date' => '2024-03-07',
                'arrival_time' => '12:00 PM',
                'means_of_transport' => 'Public Bus',
                'is_private' => false,
                'start_loc' => '27.5943, 84.4153',
                'start_loc_name' => 'Chitwan',
                'end_loc' => '27.4963, 83.2743',
                'end_loc_name' => 'Lumbini',
                'location' => [
                    '27.6739, 84.5261', // Bharatpur
                    '27.5556, 83.9778', // Tansen
                    '27.6333, 84.2333', // Butwal
                    '27.5167, 83.6333' // Siddharthanagar
                ]
            ],
            [
                'trip_name' => 'Everest Base Camp Trek',
                'trip_description' => 'A challenging trek to Everest Base Camp',
                'trip_type' => 'Trekking',
                'trip_price' => 15000,
                'start_date' => '2024-03-10',
                'end_date' => '2024-03-20',
                'arrival_time' => '5:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.9881, 86.9250',
                'end_loc_name' => 'Everest Base Camp',
                'location' => [
                    '27.7893, 85.5258', // Lukla
                    '27.8667, 86.7333', // Namche Bazaar
                    '27.9875, 86.9167', // Gorak Shep
                    '27.9333, 86.8333', // Lobuche
                    '27.8833, 86.7667' // Dingboche
                ]
            ],
            [
                'trip_name' => 'Kathmandu to Pokhara',
                'trip_description' => 'A scenic drive from Kathmandu to Pokhara',
                'trip_type' => 'Road Trip',
                'trip_price' => 5000,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-03',
                'arrival_time' => '10:00 AM',
                'means_of_transport' => 'Private Car',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '28.2123, 83.9856',
                'end_loc_name' => 'Pokhara',
                'location' => [
                    '27.7583, 85.3903', // Nagarkot
                    '27.9344, 85.2363', // Dhulikhel
                    '27.8469, 84.9263', // Bhaktapur
                    '27.8833, 84.8333' // Malekhu
                ]
            ],
            [
                'trip_name' => 'Chitwan to Lumbini',
                'trip_description' => 'A cultural tour from Chitwan to Lumbini',
                'trip_type' => 'Cultural Tour',
                'trip_price' => 3000,
                'start_date' => '2024-03-05',
                'end_date' => '2024-03-07',
                'arrival_time' => '12:00 PM',
                'means_of_transport' => 'Public Bus',
                'is_private' => false,
                'start_loc' => '27.5943, 84.4153',
                'start_loc_name' => 'Chitwan',
                'end_loc' => '27.4963, 83.2743',
                'end_loc_name' => 'Lumbini',
                'location' => [
                    '27.6739, 84.5261', // Bharatpur
                    '27.5556, 83.9778', // Tansen
                    '27.6333, 84.2333', // Butwal
                    '27.5167, 83.6333' // Siddharthanagar
                ]
            ],
            [
                'trip_name' => 'Everest Base Camp Trek',
                'trip_description' => 'A challenging trek to Everest Base Camp',
                'trip_type' => 'Trekking',
                'trip_price' => 15000,
                'start_date' => '2024-03-10',
                'end_date' => '2024-03-20',
                'arrival_time' => '5:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.9881, 86.9250',
                'end_loc_name' => 'Everest Base Camp',
                'location' => [
                    '27.7893, 85.5258', // Lukla
                    '27.8667, 86.7333', // Namche Bazaar
                    '27.9875, 86.9167', // Gorak Shep
                    '27.9333, 86.8333', // Lobuche
                    '27.8833, 86.7667' // Dingboche
                ]
            ],
            [
                'trip_name' => 'Gosaikunda Trek',
                'trip_description' => 'A beautiful trek to the sacred Gosaikunda lakes.',
                'trip_type' => 'Trekking',
                'trip_price' => 8000,
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-07',
                'arrival_time' => '6:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '28.2000, 85.5363',
                'start_loc_name' => 'Dhunche',
                'end_loc' => '28.2443, 85.4789',
                'end_loc_name' => 'Gosaikunda',
                'location' => [
                    '28.2111, 85.5163', // Sing Gompa
                    '28.2367, 85.4919', // Lauribina Yak
                ]
            ],
            [
                'trip_name' => 'Langtang Valley Trek',
                'trip_description' => 'A stunning trek through the Langtang Valley.',
                'trip_type' => 'Trekking',
                'trip_price' => 10000,
                'start_date' => '2024-04-10',
                'end_date' => '2024-04-20',
                'arrival_time' => '7:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '28.2283, 85.6156',
                'start_loc_name' => 'Syabrubesi',
                'end_loc' => '28.3402, 85.5606',
                'end_loc_name' => 'Kyanjin Gompa',
                'location' => [
                    '28.2727, 85.5772', // Lama Hotel
                    '28.3302, 85.5798', // Langtang Village
                ]
            ],
            [
                'trip_name' => 'Rara Lake Trek',
                'trip_description' => 'Discover the stunning beauty of Rara Lake.',
                'trip_type' => 'Trekking',
                'trip_price' => 12000,
                'start_date' => '2024-05-05',
                'end_date' => '2024-05-15',
                'arrival_time' => '8:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '29.4013, 82.0938',
                'start_loc_name' => 'Jumla',
                'end_loc' => '29.5650, 82.0774',
                'end_loc_name' => 'Rara Lake',
                'location' => [
                    '29.3961, 82.0980', // Cherechaur
                    '29.4743, 82.0791', // Rara National Park
                ]
            ],
            [
                'trip_name' => 'Manaslu Circuit Trek',
                'trip_description' => 'An adventurous trek around Manaslu.',
                'trip_type' => 'Trekking',
                'trip_price' => 14000,
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-15',
                'arrival_time' => '6:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => true,
                'start_loc' => '28.5462, 84.5916',
                'start_loc_name' => 'Soti Khola',
                'end_loc' => '28.5331, 84.7180',
                'end_loc_name' => 'Bhimthang',
                'location' => [
                    '28.5631, 84.6569', // Machha Khola
                    '28.5725, 84.6721', // Jagat
                ]
            ],
            [
                'trip_name' => 'Trekking to Ghorepani Poon Hill',
                'trip_description' => 'A short trek to see stunning sunrise views from Poon Hill.',
                'trip_type' => 'Trekking',
                'trip_price' => 6000,
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-05',
                'arrival_time' => '5:00 AM',
                'means_of_transport' => 'On Foot',
                'is_private' => false,
                'start_loc' => '28.2093, 83.9866',
                'start_loc_name' => 'Nayapul',
                'end_loc' => '28.4790, 83.6766',
                'end_loc_name' => 'Ghorepani',
                'location' => [
                    '28.4318, 83.6843', // Ulleri
                    '28.4792, 83.6845', // Poon Hill
                ]
            ],
        ];
    }
}
