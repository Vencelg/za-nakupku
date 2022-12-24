<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 8; $i++) {
            $data = [
                'user_id' => rand(1, 6),
                'listing_id' => fake()->unique()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            ];

            DB::table('favourites')->insert($data);
        }
    }
}
