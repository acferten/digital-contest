<?php

namespace Database\Seeders;

use Domain\Work\Enums\WorkStatus;
use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        Genre::factory()->count(6)->sequence(
            ['name' => 'Живопись'],
            ['name' => 'Портрет'],
            ['name' => 'Анималистический'],
            ['name' => 'Цифровой арт'],
            ['name' => 'Цифровая анимация'],
            ['name' => 'Импровизация']
        )->create();

        Work::factory()
            ->count(11)
            ->state(new Sequence(
                [
                    'title' => 'No-One’s Abandoning Murdock',
                    'file' => 'art1.jpg',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Rainy day',
                    'file' => 'art2.png',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Curiositea',
                    'file' => 'art3.jpg',
                    'year' => '2024',
                    'genre_id' => 4,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Recipe Madeleine',
                    'file' => 'art4.jpg',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Teabag Art',
                    'file' => 'art5.jpg',
                    'year' => '2024',
                    'genre_id' => 6,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Спящий защитник',
                    'file' => 'art6.jpg',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Рыба',
                    'file' => 'art7.jpg',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Хотдог',
                    'file' => 'art8.jpg',
                    'year' => '2024',
                    'genre_id' => 1,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'Русалка с зельями',
                    'file' => 'art9.jpg',
                    'year' => '2024',
                    'genre_id' => 4,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'cosmic cat',
                    'file' => 'art10.webp',
                    'year' => '2024',
                    'genre_id' => 5,
                    'status' => WorkStatus::Published,
                ],
                [
                    'title' => 'isometric room',
                    'file' => 'art11.webp',
                    'year' => '2024',
                    'genre_id' => 5,
                    'status' => WorkStatus::Published,
                ],
            ))
            ->create();
    }
}
