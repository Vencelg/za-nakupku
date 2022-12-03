<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = fake()->numberBetween(1, 6);
        $user = User::find($id);

        return [
            'category_id' => fake()->numberBetween(1, 10),
            'user_id' => $user->id,
            'name' => fake()->randomElement,
            'info' => fake()->text(500),
            'price' => 15000,
            'phone_number' => $user->phone_number,
            'location' => $user->location,
            'ending' => fake()->dateTimeBetween('now', '+10 days')
        ];
    }
}
