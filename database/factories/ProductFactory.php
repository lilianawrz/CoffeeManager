<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        $category = DB::table('categories')->pluck('id');
        $company = DB::table('companies')->pluck('id');
        $price = rand(0, 99) + (rand(0, 99) / 100);
        $faker = Faker::create("pt_BR");

        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'price' => number_format($price, 2),
            'quantity' => $faker->numberBetween(1, 30),
            'limitWeight' => $faker->numberBetween(1, 30),
            'validity' => $faker->date(),
            'category_id' => $faker->randomElement($category),
            'company_id' => $faker->randomElement($company),



        ];
    }
}
