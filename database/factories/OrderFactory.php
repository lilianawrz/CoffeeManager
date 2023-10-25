<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientsId = DB::table('clients')->pluck('id');

        $paymentsId = DB::table("payments")->pluck('id');

        $faker = Faker::create("pt_BR");

        return [

            'moment' => fake()->date(),
            'status' => fake()->name(),
            'client_id' => $faker->randomElement($clientsId),
            'payment_id' => $faker->randomElement($paymentsId),


        ];
    }
}