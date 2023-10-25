<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("pt_BR");

        DB::table('clients')->insert(
            [
                'name' => $faker->company,
                'cpf' => $faker->cpf,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'image' => 'image/client/' . $faker->image('public/storage/image/client', 640, 480, null, false),

            ]
        );
    }


}
;
