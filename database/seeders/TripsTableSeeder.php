<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\StopOver;
use App\Models\Trip;
use App\Models\TripLocation;
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
                'number_of_days' => 3,
                'arrival_time' => '10:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
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
                'number_of_days' => 3,
                'arrival_time' => '12:00 PM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bus',
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
                'number_of_days' => 10,
                'arrival_time' => '5:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 3,
                'arrival_time' => '10:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
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
                'number_of_days' => 3,
                'arrival_time' => '12:00 PM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bus',
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
                'number_of_days' => 10,
                'arrival_time' => '5:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 7,
                'arrival_time' => '6:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 10,
                'arrival_time' => '7:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 10,
                'arrival_time' => '8:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 15,
                'arrival_time' => '6:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'number_of_days' => 5,
                'arrival_time' => '5:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
            [
                'trip_name' => 'Road Trip to Nepal',
                'trip_description' => 'Explore the scenic beauty of Nepal on a thrilling road trip.',
                'trip_type' => 'Road Trip',
                'trip_price' => 12000,
                'start_date' => '2024-08-01',
                'end_date' => '2024-08-10',
                'number_of_days' => 10,
                'arrival_time' => '9:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3219',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '29.2744, 81.2457',
                'end_loc_name' => 'Mahendranagar',
                'location' => [
                    '27.9843, 84.4543', // Pokhara
                    '28.2453, 84.1619', // Bandipur
                    '29.0031, 81.6153', // Dhangadhi
                ]
            ],
            [
                'trip_name' => 'Road Trip to Mustang',
                'trip_description' => 'Experience the rugged beauty of Mustang on a thrilling road trip.',
                'trip_type' => 'Road Trip',
                'trip_price' => 15000,
                'start_date' => '2024-09-01',
                'end_date' => '2024-09-12',
                'number_of_days' => 12,
                'arrival_time' => '8:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => '4WD',
                'is_private' => true,
                'start_loc' => '28.2453, 84.1619',
                'start_loc_name' => 'Pokhara',
                'end_loc' => '28.7833, 83.5833',
                'end_loc_name' => 'Jomsom',
                'location' => [
                    '28.3917, 83.8667', // Tansen
                    '28.5333, 83.5333', // Kagbeni
                    '28.7833, 83.5833', // Muktinath
                ]
            ],

            [
                'trip_name' => 'Road Trip to Langtang Valley',
                'trip_description' => 'Discover the serene beauty of Langtang Valley on a relaxing road trip.',
                'trip_type' => 'Road Trip',
                'trip_price' => 9000,
                'start_date' => '2024-10-01',
                'end_date' => '2024-10-05',
                'number_of_days' => 5,
                'arrival_time' => '7:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3219',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '28.2333, 85.3667',
                'end_loc_name' => 'Dhunche',
                'location' => [
                    '28.0167, 85.3167', // Trishuli
                    '28.1333, 85.3667', // Syabrubesi
                ]
            ],
            [
                'trip_name' => 'Hiking to Nagarkot',
                'trip_description' => 'Enjoy a scenic hike to Nagarkot for breathtaking views of the Himalayas.',
                'trip_type' => 'Hiking',
                'trip_price' => 3000,
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-02',
                'number_of_days' => 1,
                'arrival_time' => '6:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => false,
                'start_loc' => '27.7172, 85.3219',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.7172, 85.5200',
                'end_loc_name' => 'Nagarkot',
                'location' => [
                    '27.6932, 85.3492', // Sankhu
                    '27.7017, 85.4535', // Changu Narayan
                ]
            ],

            [
                'trip_name' => 'Hiking to Shivapuri Peak',
                'trip_description' => 'A refreshing hike through Shivapuri National Park to the peak.',
                'trip_type' => 'Hiking',
                'trip_price' => 2500,
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-01',
                'number_of_days' => 1,
                'arrival_time' => '5:30 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => false,
                'start_loc' => '27.7833, 85.3333',
                'start_loc_name' => 'Budhanilkantha',
                'end_loc' => '27.8333, 85.4667',
                'end_loc_name' => 'Shivapuri Peak',
                'location' => [
                    '27.8000, 85.3667', // Nagi Gompa
                    '27.8333, 85.4000', // Baghdwar
                ]
            ],

            [
                'trip_name' => 'Hiking to Dhulikhel',
                'trip_description' => 'Hike to Dhulikhel for stunning panoramic views and cultural experiences.',
                'trip_type' => 'Hiking',
                'trip_price' => 3500,
                'start_date' => '2025-01-15',
                'end_date' => '2025-01-16',
                'number_of_days' => 2,
                'arrival_time' => '6:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => false,
                'start_loc' => '27.6710, 85.4298',
                'start_loc_name' => 'Banepa',
                'end_loc' => '27.6187, 85.5436',
                'end_loc_name' => 'Dhulikhel',
                'location' => [
                    '27.6500, 85.5000', // Namobuddha
                    '27.6278, 85.5372', // Panauti
                ]
            ],

            [
                'trip_name' => 'Rafting in Bhote Koshi',
                'trip_description' => 'Experience thrilling white-water rafting in the Bhote Koshi river.',
                'trip_type' => 'Adventure',
                'trip_price' => 6000,
                'start_date' => '2024-02-15',
                'end_date' => '2024-02-16',
                'number_of_days' => 2,
                'arrival_time' => '9:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bus',
                'is_private' => false,
                'start_loc' => '27.7892, 85.3247',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.7630, 85.4230',
                'end_loc_name' => 'Bhote Koshi',
                'location' => [
                    '27.7624, 85.4112', // Bali
                    '27.7000, 85.3000', // Dolakha
                ]
            ],
            [
                'trip_name' => 'Cycling Tour of Kathmandu Valley',
                'trip_description' => 'Explore the Kathmandu Valley on a thrilling cycling tour.',
                'trip_type' => 'Adventure',
                'trip_price' => 4500,
                'start_date' => '2024-02-20',
                'end_date' => '2024-02-22',
                'number_of_days' => 3,
                'arrival_time' => '8:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bike',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.7025, 85.2911',
                'end_loc_name' => 'Bhaktapur',
                'location' => [
                    '27.6599, 85.4290', // Nagarkot
                    '27.6756, 85.4990', // Dhulikhel
                ],
            ],
            [
                'trip_name' => 'Wildlife Safari in Bardiya',
                'trip_description' => 'Experience the rich wildlife of Bardiya National Park.',
                'trip_type' => 'Wildlife Tour',
                'trip_price' => 7000,
                'start_date' => '2024-03-25',
                'end_date' => '2024-03-30',
                'number_of_days' => 5,
                'arrival_time' => '11:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bus',
                'is_private' => true,
                'start_loc' => '27.5943, 84.4153',
                'start_loc_name' => 'Chitwan',
                'end_loc' => '28.5560, 81.4874',
                'end_loc_name' => 'Bardiya',
                'location' => [
                    '28.5883, 81.5770', // Thakurdwara
                    '28.5111, 81.5722', // Bhurigaun
                ]
            ],
            [
                'trip_name' => 'Cultural Heritage Tour of Kathmandu',
                'trip_description' => 'Explore the rich cultural heritage sites of Kathmandu Valley.',
                'trip_type' => 'Cultural Tour',
                'trip_price' => 5000,
                'start_date' => '2024-04-05',
                'end_date' => '2024-04-06',
                'number_of_days' => 2,
                'arrival_time' => '10:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => false,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.7100, 85.2939',
                'end_loc_name' => 'Patan',
                'location' => [
                    '27.7015, 85.3240', // Swayambhunath
                    '27.6745, 85.3247', // Boudhanath
                ]
            ],
            [
                'trip_name' => 'Exploring the Annapurna Circuit',
                'trip_description' => 'Embark on an adventurous trek around the Annapurna Circuit.',
                'trip_type' => 'Trekking',
                'trip_price' => 18000,
                'start_date' => '2024-05-20',
                'end_date' => '2024-06-03',
                'number_of_days' => 15,
                'arrival_time' => '7:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => true,
                'start_loc' => '28.2093, 83.9866',
                'start_loc_name' => 'Nayapul',
                'end_loc' => '28.5672, 83.8937',
                'end_loc_name' => 'Jomsom',
                'location' => [
                    '28.4263, 83.6754', // Tikhedhunga
                    '28.4740, 83.8858', // Manang
                ]
            ],
            [
                'trip_name' => 'Hiking to Langtang Gosaikunda',
                'trip_description' => 'Trek through Langtang Valley to the sacred Gosaikunda lakes.',
                'trip_type' => 'Trekking',
                'trip_price' => 9500,
                'start_date' => '2024-07-10',
                'end_date' => '2024-07-16',
                'number_of_days' => 7,
                'arrival_time' => '6:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => true,
                'start_loc' => '28.2283, 85.6156',
                'start_loc_name' => 'Syabrubesi',
                'end_loc' => '28.2443, 85.4789',
                'end_loc_name' => 'Gosaikunda',
                'location' => [
                    '28.2111, 85.5163', // Sing Gompa
                    '28.2367, 85.4919', // Lauribina Yak
                ]
            ],
            [
                'trip_name' => 'Trekking to Poon Hill',
                'trip_description' => 'A short trek to witness breathtaking sunrise views from Poon Hill.',
                'trip_type' => 'Trekking',
                'trip_price' => 7000,
                'start_date' => '2024-08-15',
                'end_date' => '2024-08-20',
                'number_of_days' => 5,
                'arrival_time' => '5:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
            [
                'trip_name' => 'Cultural Tour of Bhaktapur',
                'trip_description' => 'Explore the ancient city of Bhaktapur with its rich history and culture.',
                'trip_type' => 'Cultural Tour',
                'trip_price' => 4000,
                'start_date' => '2024-09-05',
                'end_date' => '2024-09-06',
                'number_of_days' => 2,
                'arrival_time' => '10:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => false,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '27.6719, 85.4292',
                'end_loc_name' => 'Bhaktapur',
                'location' => [
                    '27.6690, 85.5034', // Changunarayan
                    '27.6762, 85.4339', // Bhadgaon
                ]
            ],
            [
                'trip_name' => 'Mountain Biking in Pokhara',
                'trip_description' => 'Enjoy thrilling mountain biking through the hills around Pokhara.',
                'trip_type' => 'Adventure',
                'trip_price' => 5000,
                'start_date' => '2024-09-20',
                'end_date' => '2024-09-22',
                'number_of_days' => 3,
                'arrival_time' => '8:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Bike',
                'is_private' => true,
                'start_loc' => '28.2093, 83.9866',
                'start_loc_name' => 'Pokhara',
                'end_loc' => '28.2375, 83.9944',
                'end_loc_name' => 'Sarangkot',
                'location' => [
                    '28.2333, 83.9494', // Lakeside
                    '28.1963, 83.9644', // Pame
                ]
            ],
            [
                'trip_name' => 'Camping at Rara Lake',
                'trip_description' => 'Experience the serene beauty of Rara Lake with an overnight camping trip.',
                'trip_type' => 'Camping',
                'trip_price' => 7500,
                'start_date' => '2024-10-10',
                'end_date' => '2024-10-12',
                'number_of_days' => 3,
                'arrival_time' => '9:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
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
                'trip_name' => 'Ghorepani Poon Hill Trek',
                'trip_description' => 'A popular trek to see the stunning views of the Annapurna range.',
                'trip_type' => 'Trekking',
                'trip_price' => 6500,
                'start_date' => '2024-10-15',
                'end_date' => '2024-10-19',
                'number_of_days' => 5,
                'arrival_time' => '4:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Foot',
                'is_private' => true,
                'start_loc' => '28.2093, 83.9866',
                'start_loc_name' => 'Nayapul',
                'end_loc' => '28.4790, 83.6766',
                'end_loc_name' => 'Ghorepani',
                'location' => [
                    '28.4318, 83.6843', // Ulleri
                    '28.4792, 83.6845', // Poon Hill
                ]
            ],
            [
                'trip_name' => 'Scenic Drive to Bandipur',
                'trip_description' => 'Enjoy a scenic drive to the hilltop town of Bandipur.',
                'trip_type' => 'Road Trip',
                'trip_price' => 5000,
                'start_date' => '2024-11-10',
                'end_date' => '2024-11-11',
                'number_of_days' => 2,
                'arrival_time' => '10:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => true,
                'start_loc' => '27.7172, 85.3240',
                'start_loc_name' => 'Kathmandu',
                'end_loc' => '28.2453, 84.1619',
                'end_loc_name' => 'Bandipur',
                'location' => [
                    '28.3038, 84.3741', // Dumre
                    '28.2000, 84.2000', // Damauli
                ]
            ],
            [
                'trip_name' => 'Photography Tour in Pokhara',
                'trip_description' => 'Capture the beauty of Pokhara and its stunning landscapes.',
                'trip_type' => 'Photography',
                'trip_price' => 3000,
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-03',
                'number_of_days' => 3,
                'arrival_time' => '7:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => false,
                'start_loc' => '28.2093, 83.9866',
                'start_loc_name' => 'Pokhara',
                'end_loc' => '28.2333, 83.8999',
                'end_loc_name' => 'Sarangkot',
                'location' => [
                    '28.2014, 83.9845', // Fewa Lake
                    '28.2038, 83.9494', // World Peace Pagoda
                ]
            ],
            [
                'trip_name' => 'Skiing in Gulmarg',
                'trip_description' => 'Experience the thrill of skiing in the beautiful Gulmarg region.',
                'trip_type' => 'Adventure',
                'trip_price' => 15000,
                'start_date' => '2024-12-15',
                'end_date' => '2024-12-20',
                'number_of_days' => 6,
                'arrival_time' => '9:00 AM',
                'total_people' => (string)rand(5, 10),
                'means_of_transport' => 'Car',
                'is_private' => true,
                'start_loc' => '34.0085, 74.3710',
                'start_loc_name' => 'Srinagar',
                'end_loc' => '34.0200, 74.3687',
                'end_loc_name' => 'Gulmarg',
                'location' => [
                    '34.0429, 74.3661', // Gulmarg Ski Resort
                    '34.0492, 74.3740', // Khilanmarg
                ]
            ],
        ];

        foreach($trips as $trip){
            $tripInsertData = Trip::create([
                'user_id' => rand(1,2),
                'trip_name' => $trip['trip_name'],
                'trip_description' => $trip['trip_description'],
                'trip_type' => $trip['trip_type'],
                'trip_price' => $trip['trip_price'],
                'start_date' => $trip['start_date'],
                'end_date' => $trip['end_date'],
                'number_of_days' => floor((abs(strtotime($trip['end_date']) - strtotime($trip['start_date']))) / (60*60*24)),
                'total_people' => $trip['total_people'],
                'means_of_transport' => $trip['means_of_transport'],
                'is_private' => $trip['is_private'],
            ]);

            TripLocation::create([
                'trip_id' => $tripInsertData->id,
                'start_loc' => $trip['start_loc'],
                'start_loc_name' => $trip['start_loc_name'],
                'end_loc' => $trip['end_loc'],
                'end_loc_name' => $trip['end_loc_name'],
            ]);

            if(isset($trip['location']) && is_array($trip['location'])){
                foreach ($trip['location'] as $location) {
                    StopOver::create([
                        'trip_id' => $tripInsertData->id,
                        'location' => $location,
                    ]);
                }
            }
        }
    }
}
