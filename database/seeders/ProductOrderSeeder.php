<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = DB::table('products')->pluck('id');
        $order = DB::table('orders')->pluck('id');

        $faker = Faker::create("pt_BR");


        foreach (\range(1, 5) as $index) {
            $price = rand(0, 99) + (rand(0, 99) / 100);

            DB::table('productOrders')->insert(
                [
                    'price' => number_format($price, 2),
                    'quantity' => $faker->numberBetween(1, 30),
                    'order_id' => $faker->randomElement($order),
                    'product_id' => $faker->randomElement($product),

                ]
            );

        }
    }
}
;