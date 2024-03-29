<?php

namespace Database\Factories\Work;

use Domain\Shared\Models\User;
use Domain\Work\Enums\WorkStatus;
use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    protected $model = Work::class;

    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'file' => fake()->randomElement(['artwork'.fake()->numberBetween(1, 5).'.jpg']),
            'genre_id' => Genre::all()->random()->id,
            'year' => fake()->numberBetween(2000, 2024),
            'user_id' => User::all()->whereNotIn('username', ['admin'])->random()->id,
            'status' => fake()->randomElement(WorkStatus::values()),
        ];
    }
}
