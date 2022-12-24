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
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ListingSeeder::class);
        $this->call(ListingImageSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(FavouritesSeeder::class);
    }
}
