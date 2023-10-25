<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cnpj' => $this->faker->cnpj,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'paymentType' => $this->faker->randomElement(['Credit Card', 'Bank Transfer']),
            'deadline' => $this->faker->numberBetween(1, 30),

        ];
    }
}