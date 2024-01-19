<?php

namespace Database\Factories\Partners;

use Domain\Partners\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'logo' => fake()->randomElement(['logo'.fake()->numberBetween(1, 3).'.jpg', 'logo4.png']),
        ];
    }
}
