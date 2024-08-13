<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Slymee',
                'username' => 'slymee',
                'email' => 'random_slymee@email.com',
                'password' => bcrypt('password'),
                'contact' => '9851234567',
                'bio' => 'Just a simple ordinary bio.',
                'address' => 'Indrachowk, Kathmandu, Nepal'
            ],
            [
                'name' => 'Ngix',
                'username' => 'ngix',
                'email' => 'random_ngix@email.com',
                'password' => bcrypt('password'),
                'contact' => '9851234561',
                'bio' => 'Just a simple ordinary bio.',
                'address' => 'Baneshwore, Kathmandu, Nepal'
            ],
            [
                'name' => 'Dell',
                'username' => 'dell',
                'email' => 'random_dell@email.com',
                'password' => bcrypt('password'),
                'contact' => '9851234560',
                'bio' => 'Just a simple ordinary bio.',
                'address' => 'Makkhan, Kathmandu, Nepal'
            ],
            [
                'name' => 'Mac',
                'username' => 'mac',
                'email' => 'random_mac@email.com',
                'password' => bcrypt('password'),
                'contact' => '9851234562',
                'bio' => 'Just a simple ordinary bio.',
                'address' => 'Keyatahity, Kathmandu, Nepal'
            ],
            [
                'name' => 'Lenovo',
                'username' => 'lenovo',
                'email' => 'random_lenovo@email.com',
                'password' => bcrypt('password'),
                'contact' => '9851234563',
                'bio' => 'Just a simple ordinary bio.',
                'address' => 'Ason, Kathmandu, Nepal'
            ],
        ];

        $userId = [];
        foreach($userData as $data){
            $user = User::create($data);
            $userId[] = $user->id;
        }

        $userAddress = [
                'street_name' => 'New Road',
                'city_name' => 'Kathmandu',
                'state_province' => 'Bagmati',
                'postal_code' => 44600,
                'country_name' => 'Nepal',
        ];

        foreach($userId as $id => $valueId){
            Address::create(array_merge(['user_id' => $valueId], $userAddress));
        }
    }
}
