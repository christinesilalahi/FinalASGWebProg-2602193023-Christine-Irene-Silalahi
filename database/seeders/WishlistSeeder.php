<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wishlist;
use Faker\Factory as Faker;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            Wishlist::create([
                'user_id' => $faker->numberBetween(1, 50),
                'wished_user_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
