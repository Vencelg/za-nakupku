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
            'url' => 'https://scontent-prg1-1.xx.fbcdn.net/v/t1.6435-9/146492478_2916079318663724_3689580725300942431_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=NXidcPGAwLwAX_ZTJOa&_nc_ht=scontent-prg1-1.xx&oh=00_AfBzHHIr1OjuDDoe2b8g1oJlWeJBtMtuP3HV_1MBUA85ag&oe=63C56954'
        ];
    }
}
