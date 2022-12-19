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
        $images = [
            'https://g.denik.cz/1/f7/fiat-multipla-2002-1280-03_denik-630-16x9.jpg',
            'https://mf.b37mrtl.ru/rbthmedia/images/2021.05/original/60b4cf3985600a50dd341bb7.jpg',
            'https://www.thesprucepets.com/thmb/7TDhfkK5CAKBWEaJfez6607J48Y=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/chinese-dog-breeds-4797219-hero-2a1e9c5ed2c54d00aef75b05c5db399c.jpg',
            'https://cdn.shopify.com/s/files/1/0053/8348/7570/products/foam-latex-witches-nose-prosthetics-alternative-view1_2000x_268139c6-9e68-497b-975b-8191eb894eec_900x.jpg?v=1641315675',
            'https://im9.cz/iR/importprodukt-orig/500/500c2faf8125d023cbb3160516b3f92f--mmf400x400.jpg'
        ];

        return [
            'listing_id' => $listing->id,
            'name' => str_replace(' ', '_', $listing->name) . '_' . $listing->id . '_' . time() . '_image.jpg',
            'url' => $images[rand(0, 4)]
        ];
    }
}
