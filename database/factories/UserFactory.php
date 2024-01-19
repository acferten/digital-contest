<?php

namespace Database\Factories;

use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName('female'),
            'last_name' => fake()->lastName('female'),
            'password' => Hash::make('password'),
            'email' => fake()->email,
            'about' => fake()->realTextBetween(200, 300),
            'username' => 'username',
            'profile_picture' => 'default.jpg',
        ];
    }

    public function admin(string $login = 'admin'): Factory
    {
        return $this->state(function (array $attributes) use ($login) {
            return [
                'email' => "{$login}@gmail.com",
                'username' => $login,
            ];
        })->afterCreating(function (User $user) {
            $user->assignRole('admin');
        });
    }
}
