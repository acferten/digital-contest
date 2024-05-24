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
            ->count(1)
            ->state(new Sequence(
                [
                    'title' => '3 лучшие работы',
                    'photo' => 'prize1.jpg',
                    'description' => 'Выставка в музее в Париже',
                    'importance' => 1
                ]
            ))
            ->create();
    }
}
