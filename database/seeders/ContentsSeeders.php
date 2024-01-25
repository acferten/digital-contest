<?php

namespace Database\Seeders;

use Domain\Shared\Models\Content;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ContentsSeeders extends Seeder
{
    public function run(): void
    {
        Content::factory()->count(2)
            ->state(new Sequence(
                ['for' => 'about_the_contest'],
                ['for' => 'partners'],
            ))->create();
    }
}
