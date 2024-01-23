<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProductsSeeder::class,
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class,
            WorkSeeder::class,
            PrizeSeeder::class,
            PartnersSeeder::class,
            NewsSeeder::class,
            ContentsSeeders::class
        ]);
    }
}
