<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VerificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone' => fake()->unique()->numberBetween(60000000, 65999999),
            'code' => fake()->numberBetween(10000, 99999),
            'status' => fake()->boolean(80),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-M-D H:i:s'),
            'update_at' => fake()->dateTimeBetween('-3 month', 'now')->format('Y-M-D H:i:s'),
        ];
    }
}
