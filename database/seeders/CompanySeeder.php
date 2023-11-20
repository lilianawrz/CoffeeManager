<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create("pt_BR");

        DB::table('companies')->insert([
            'name' => $faker->company,
            'cnpj' => $faker->cnpj,
            'email' => $faker->email,
            'phone' => $faker->phoneNumber,
            'paymentType' => $faker->randomElement(['Credit Card', 'Bank Transfer']),
            'deadline' => $faker->numberBetween(1, 30),
        ]);
    }
    
}