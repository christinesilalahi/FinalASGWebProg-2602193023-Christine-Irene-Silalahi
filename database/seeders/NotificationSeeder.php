<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;
use Faker\Factory as Faker;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {
            Notification::create([
                'user_id' => $faker->numberBetween(1, 50),
                'content' => $faker->sentence(),
                'status' => $faker->randomElement(['unread', 'read']),
            ]);
        }
    }
}
