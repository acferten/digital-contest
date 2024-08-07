<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            ContentsSeeders::class,
            ProductsSeeder::class,
            UsersSeeder::class,
            WorkSeeder::class,
            PrizeSeeder::class,
            PartnersSeeder::class,
            NewsSeeder::class,

        ]);
    }
}
