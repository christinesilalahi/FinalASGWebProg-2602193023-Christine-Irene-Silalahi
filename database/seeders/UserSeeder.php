<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('password'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'field_of_work' => json_encode($faker->randomElements(['IT', 'Finance', 'Education', 'Healthcare', 'Sales', 'Agriculture', 'Art', 'Law'], 3)),
                'linkedin_username' => $faker->userName,
                'mobile_number' => $faker->phoneNumber,
                'country' => $faker->country,
                'coins' => $faker->numberBetween(0, 500),
                'visible' => $faker->boolean(80),
                'profile_picture' => $faker->imageUrl(200, 200, 'people', true, 'Profile Picture'),
            ]);
        }
    }
}
