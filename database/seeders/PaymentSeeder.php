<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("pt_BR");


        foreach (\range(1, 5) as $index) {

            DB::table('payments')->insert(
                [
                    'name' => $faker->name(),
                    'moment' => $faker->date(),

                ]
            );
        }

    }
}
;