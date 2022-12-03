<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingImage>
 */
class ListingImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = fake()->numberBetween(1, 25);
        $listing = Listing::find($id);

        return [
            'listing_id' => $listing->id,
            'name' => str_replace(' ', '_', $listing->name) . '_' . $listing->id . '_' . time() . '_image.jpg',
            'url' => fake()->imageUrl()
        ];
    }
}
