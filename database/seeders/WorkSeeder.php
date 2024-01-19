<?php

namespace Database\Seeders;

use Domain\Work\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        Work::factory()->count(15)->create();
    }
}
