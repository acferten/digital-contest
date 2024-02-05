<?php

namespace Database\Seeders;

use Domain\Products\Enums\ProductEnum;
use Domain\Products\Models\Product;
use Domain\Shared\Models\User;
use Domain\Work\Models\Work;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()->count(2)
            ->state(new Sequence(
                ['name' => ProductEnum::Voting->value, 'price' => 20],
                ['name' => ProductEnum::Publish->value, 'price' => 100],
            ))->create();

        Product::all()->each(function (Product $product) {

            $product->payments()->save(User::all()->random(),
                ['invoice_id' => fake()->numberBetween(2290, 9839),
                    'work_id' => Work::all()->random()->id]);

            $product->payments()->save(User::all()->random(),
                ['invoice_id' => fake()->numberBetween(2290, 9839),
                    'work_id' => Work::all()->random()->id]);

            $product->payments()->save(User::all()->random(),
                ['invoice_id' => fake()->numberBetween(2290, 9839),
                    'work_id' => Work::all()->random()->id]);
        });
    }
}
