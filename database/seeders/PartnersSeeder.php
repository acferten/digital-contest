<?php

namespace Database\Seeders;

use Domain\Partners\Models\Partner;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    public function run(): void
    {
        Partner::factory()->count(5)->create();
    }
}
