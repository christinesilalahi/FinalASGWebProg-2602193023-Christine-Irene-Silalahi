<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Avatar;
use Faker\Factory as Faker;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            Avatar::create([
                'name' => $faker->word(),
                'price' => $faker->numberBetween(1000, 10000),
                'image_url' => $faker->imageUrl(200, 200, 'abstract', true, 'Avatar Image'),
            ]);
        }
    }
}
