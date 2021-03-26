<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            // UserSeeder::class,
            // ColorSeeder::class,
            // SizeSeeder::class,
            // CategorySeeder::class,
            // ProductSeeder::class,
            // MediaSeeder::class,
            // MediaForAllProductsSeeder::class,
        ]);
    }
}
