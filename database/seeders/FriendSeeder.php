<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Friend;
use Faker\Factory as Faker;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {
            Friend::create([
                'user_id' => $faker->numberBetween(1, 50),
                'friend_id' => $faker->numberBetween(1, 50),
                'status' => $faker->randomElement(['pending', 'accepted', 'declined']),
            ]);
        }
    }
}
