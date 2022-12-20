<?php

namespace App\Http\Controllers\API;

use App\Enums\ListingStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class MainPageController extends Controller
{

    /**
     * @param int $maxPrice
     *
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(int $maxPrice): JsonResponse
    {
        $endingListings = null;
        $category = null;

        if (!(request()->get('onlyPriceListings') === "true")) {
            $endingListings =
                Listing::with(['user', 'category', 'listingImages'])->whereStatus(ListingStatusEnum::SOON_ENDING)
                    ->orderBy('ending')->get(
                );
            $category = Category::random();
        }
        $upToMaxPrice = Listing::with(['user', 'category', 'listingImages'])->where('price', '<=', $maxPrice)->get();

        return $this->response([
            'soonEnding' => $endingListings,
            'randomCategory' => $category,
            'upToMaxPrice' => $upToMaxPrice
        ], 200);
    }
}
