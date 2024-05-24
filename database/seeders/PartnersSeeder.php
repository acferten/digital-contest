<?php

namespace Database\Seeders;

use Domain\Partners\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    public function run(): void
    {
        Partner::factory()
            ->count(3)
            ->state(new Sequence(
                [
                    'logo' => 'logo4.png',
                    'name' => 'ВТБ'
                ],
                [
                    'logo' => 'logo5.png',
                    'name' => 'Русский музей'
                ],
                [
                    'logo' => 'logo3.jpg',
                    'name' => 'Сбер'
                ],
            ))->create();
    }
}
