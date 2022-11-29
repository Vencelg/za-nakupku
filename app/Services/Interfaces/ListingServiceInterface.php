<?php

namespace App\Services\Interfaces;

use App\Models\Listing;
use Illuminate\Http\UploadedFile;

/**
 * Interface ListingServiceInterface
 * @package App\Services\Interfaces
 */
interface ListingServiceInterface
{
    /**
     * @param UploadedFile $image
     * @param Listing $listing
     * @return void
     */
    public function saveListingImages(UploadedFile $image, Listing $listing): void;

    /**
     * @param Listing $listing
     * @return void
     */
    public function deleteListingImages(Listing $listing): void;

}
