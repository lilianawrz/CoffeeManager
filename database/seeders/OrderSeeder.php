<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientsId = DB::table('clients')->pluck('id');

        $paymentsId = DB::table("payments")->pluck('id');

        $faker = Faker::create("pt_BR");


        foreach (\range(1, 5) as $index) {

            DB::table('orders')->insert(
                [

                    'moment' => $faker->date(),
                    'status' => $faker->name(),
                    'client_id' => $faker->randomElement($clientsId),
                    'payment_id' => $faker->randomElement($paymentsId),

                ]
            );
        }

    }
}
;