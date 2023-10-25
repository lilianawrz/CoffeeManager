<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductOrder>
 */
class ProductOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        $product = DB::table('products')->pluck('id');
        $order = DB::table('orders')->pluck('id');

        $price = rand(0, 99) + (rand(0, 99) / 100);
        $faker = Faker::create("pt_BR");

        return [

            'price' => number_format($price, 2),
            'quantity' => $faker->numberBetween(1, 30),
            'product_id' => $faker->randomElement($product),
            'order_id' => $faker->randomElement($order),



        ];
    }
}
