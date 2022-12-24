<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FavouritesService;
use App\Services\Interfaces\FavouritesServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * FavouritesController.
 *
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class FavouritesController extends Controller
{
    public function __construct(
        protected FavouritesServiceInterface $service = new FavouritesService()
    ) {
        $this->middleware('auth:sanctum');
    }

    /**
     * @param Request $request
     * @param int $listingId
     *
     * @return JsonResponse
     * @throws ServiceException
     */
    public function addFavourite(Request $request, int $listingId): JsonResponse
    {
        $user = $request->user();
        $this->service->checkCombinationUniqueness($user, $listingId);
        $user->favouriteListings()->attach($listingId);

        return $this->response([], 200);
    }

    /**
     * @param Request $request
     * @param int $listingId
     *
     * @return JsonResponse
     * @throws ServiceException
     */
    public function delFavourite(Request $request, int $listingId): JsonResponse
    {
        $user = $request->user();
        $this->service->checkCombinationExistence($user, $listingId);
        $user->favouriteListings()->detach($listingId);

        return $this->response([], 200);
    }
}
