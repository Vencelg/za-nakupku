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
            'https://hips.hearstapps.com/hmg-prod/images/2023-mclaren-artura-101-1655218102.jpg',
            'https://carwow-uk-wp-3.imgix.net/18015-MC20BluInfinito-scaled-e1666008987698.jpg',
            'https://www.topgear.com/sites/default/files/2022/07/6_0.jpg',
            'https://cb.scene7.com/is/image/Crate/cb_mSC_20230209_Furniture_Media',
            'https://cdn11.bigcommerce.com/s-1u1m3wn/stencil/f0d917b0-a9ca-013a-dc54-429aee3ea0c9/e/72f7f5d0-cf5a-013b-0a19-26ac30a24330/img/custom_img/furniture_type_01.jpg',
            'https://imgmedia.lbb.in/media/2021/01/60142ab00289447bf3e96b23_1611934384502.jpg',
            'https://www.therhodesgroup.com/wp-content/uploads/2020/04/RHO-7-Blog-COVID-Real-Estate-Facts-6700-golf-dr-dallas-tx-High-Res-4_CROP.jpg',
            'https://d1ja9tyo8nbkbc.cloudfront.net/54151999_S0419/S0419/S0419-R0100/427054645/427054645-1.jpg',
            'https://content.mediastg.net/dyna_images/mls/1470/22121000.jpgx',
            'https://dks.scene7.com/is/image/GolfGalaxy/17GTXMGGRSSRPRXXXPRF_Matte_Black_Wet_Cement',
            'https://cdn.shopify.com/s/files/1/1803/3819/products/BIKPTRAILBK_media-07_1048x1048.jpg',
            'https://cdn.shopify.com/s/files/1/1803/3819/products/BIKPTRAILBK_media-08_1048x1048.jpg',
            'https://pcpraha.cz/wp-content/uploads/2021/07/nejlevnejsi-herni-pc-i3-2021-sestava-ddr4-8gb-i3-10105f-rx-580-ssd-hlavni.jpg',
            'https://computer-outlet.cz/img/product_media/7001-8000/1_Z24908_96167(4)(1).jpg',
            'https://pcpraha.cz/wp-content/uploads/2021/07/nejlevnejsi-herni-pc-i3-2021-sestava-ddr4-8gb-i3-10105f-rx-580-ssd-300x300.jpg',
        ];


        return [
            'listing_id' => $listing->id,
            'name' => str_replace(' ', '_', $listing->name) . '_' . $listing->id . '_' . time() . '_image.jpg',
            'url' => $images[rand(0, count($images))]
        ];
    }
}
