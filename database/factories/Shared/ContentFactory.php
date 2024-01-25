<?php

namespace Database\Factories\Shared;

use Domain\Shared\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition(): array
    {
        return [
            'for' => fake()->word(),
            'text' => fake()->realTextBetween(300, 400),
        ];
    }
}
