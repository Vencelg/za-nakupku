<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\Interfaces\ListingServiceInterface;
use Illuminate\Http\UploadedFile;
use Storage;

/**
 * Class ListingService
 * @package App\Services
 */
class ListingService implements ListingServiceInterface
{
    /**
     * @inheritDoc
     */
    public function saveListingImages(UploadedFile $image, Listing $listing): void
    {
        $newImage = new ListingImage([
            'listing_id' => $listing->id,
            'name' => '',
            'url' => ''
        ]);

        $imageName = str_replace(' ', '_', $listing->name) . '_' . $listing->id . '_' . $newImage->id . time() . '_image.' . $image->extension();
        $image->storeAs('public/images', $imageName);

        $newImage->setAttribute('name', $imageName);
        $newImage->setAttribute('url', url('/') . Storage::url('public/images/' . $imageName));
        $newImage->save();
    }

    /**
     * @inheritDoc
     */
    public function deleteListingImages(Listing $listing): void
    {
        foreach ($listing->listingImages as $listingImage) {
            Storage::delete('public/images/' . $listingImage->name);
            $listingImage->delete();
        }
    }
}
