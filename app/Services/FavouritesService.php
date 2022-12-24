<?php

namespace App\Services;

use App\Exceptions\ServiceException;
use App\Models\Listing;
use App\Models\User;
use App\Services\Interfaces\FavouritesServiceInterface;

/**
 * Class FavouritesService
 *
 * @package App\Services
 */
class FavouritesService implements FavouritesServiceInterface
{
    /**
     * @inheritDoc
     * @throws ServiceException
     */
    public function checkCombinationUniqueness(User $user, int $listingId): void
    {
        $listing = $user->favouriteListings()->where('listing_id', $listingId)->first();
        if ($listing instanceof Listing) {
            throw new ServiceException('UserId and ListingId combination already exists', 400);
        }
    }

    /**
     * @inheritDoc
     * @throws ServiceException
     */
    public function checkCombinationExistence(User $user, int $listingId): void
    {
        $listing = $user->favouriteListings()->where('listing_id', $listingId)->first();
        if (!($listing instanceof Listing)) {
            throw new ServiceException('UserId and ListingId combination doesn\'t exists', 400);
        }
    }
}
