<?php

namespace Database\Factories\Prize;

use Domain\Prize\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrizeFactory extends Factory
{
    protected $model = Prize::class;

    public function definition(): array
    {
        return [
            'place' => fake()->numberBetween(1, 6),
            'photo' => fake()->randomElement(['prize'.fake()->numberBetween(1, 3).'.jpg']),
            'description' => fake()->realTextBetween(100, 500),
        ];
    }
}
