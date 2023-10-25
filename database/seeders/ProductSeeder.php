<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = DB::table('categories')->pluck('id');
        $company = DB::table('companies')->pluck('id');

        $faker = Faker::create("pt_BR");


        foreach (\range(1, 5) as $index) {
            $price = rand(0, 99) + (rand(0, 99) / 100);

            DB::table('products')->insert(
                [

                    'name' => $faker->name(),
                    'description' => $faker->name(),
                    'price' => number_format($price, 2),
                    'quantity' => $faker->numberBetween(1, 30),
                    'limitWeight' => $faker->numberBetween(1, 30),
                    'validity' => $faker->date(),
                    'category_id' => $faker->randomElement($category),
                    'company_id' => $faker->randomElement($company),

                ]
            );

        }
    }
}
;
