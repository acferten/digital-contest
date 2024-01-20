<?php

namespace Database\Seeders;

use Domain\News\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::factory()->count(10)->create();
    }
}
