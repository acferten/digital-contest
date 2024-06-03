<?php

namespace Database\Seeders;

use Domain\Prize\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    public function run(): void
    {
        Prize::factory()
            ->count(2)
            ->state(new Sequence(
                [
                    'title' => 'Выставка в музее в Париже',
                    'photo' => 'prize1.jpg',
                    'description' => '3 лучшие работы',
                ],
                [
                    'title' => 'Выставка в Русском музее',
                    'photo' => 'prize2.jpg',
                    'description' => '15 лучших работ',
                ]
            ))
            ->create();
    }
}
