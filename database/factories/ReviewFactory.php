<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $numbers = range(1, 6);
        shuffle($numbers);
        $ids = array_slice($numbers, 0, 2);

        return [
            'user_id' => $ids[0],
            'created_by_id' => $ids[1],
            'header' => fake()->text(20),
            'body' => fake()->text(),
            'rating' => rand(0, 5),
        ];
    }
}
