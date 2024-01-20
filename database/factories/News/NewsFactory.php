<?php

namespace Database\Factories\News;

use Domain\News\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'content' => fake()->realTextBetween(200,500),
            'publication_date' => fake()->dateTimeBetween('-2 years', 'now')
        ];
    }
}
