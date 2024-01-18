<?php

namespace Database\Seeders;

use Domain\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(2)
            ->state(new Sequence(
                ['name' => 'Голос за работу', 'price' => 20],
                ['name' => 'Размещение работы', 'price' => 100],
            ))->create();
    }
}
