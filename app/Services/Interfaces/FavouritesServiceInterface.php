<?php

namespace App\Services\Interfaces;

use App\Models\User;

/**
 * Interface FavouritesServiceInterface
 *
 * @package App\Services\Interfaces
 */
interface FavouritesServiceInterface
{
    /**
     * @param User $user
     * @param int $listingId
     *
     * @return void
     */
    public function checkCombinationUniqueness(User $user, int $listingId): void;

    /**
     * @param User $user
     * @param int $listingId
     *
     * @return void
     */
    public function checkCombinationExistence(User $user, int $listingId): void;
}
