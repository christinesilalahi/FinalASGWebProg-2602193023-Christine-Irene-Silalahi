<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 200; $i++) {
            Message::create([
                'sender_id' => $faker->numberBetween(1, 50),
                'receiver_id' => $faker->numberBetween(1, 50),
                'message' => $faker->sentence(),
                'avatar_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
