<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->text(15);
        $icons = ['electric-scooter', 'emoji-nature', 'dry', 'drive-eta', 'dock'];

        return [
            'name' => $name,
            'code' => $name.'_code',
            'icon' => $icons[rand(0,4)]
        ];
    }
}
