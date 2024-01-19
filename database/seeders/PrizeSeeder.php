<?php

namespace Database\Seeders;

use Domain\Prize\Models\Prize;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    public function run(): void
    {
        Prize::factory()->count(5)->create();
    }
}
