<?php

namespace Database\Seeders;

use Domain\Work\Models\Genre;
use Domain\Work\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        Genre::factory()->count(4)->sequence(
                ['name' => 'Живопись'],
                ['name' => 'Портрет'],
                ['name' => 'Анималистический'],
                ['name' => 'Цифровая анимация'])
            ->create();

        Work::factory()->count(100)->create();
    }
}
