<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegistrationPayment;
use Faker\Factory as Faker;

class RegistrationPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            RegistrationPayment::create([
                'user_id' => $faker->numberBetween(1, 50),
                'amount_paid' => $faker->numberBetween(10000, 100000),
                'amount_due' => $faker->numberBetween(0, 50000),
            ]);
        }
    }
}
