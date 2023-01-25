<?php

namespace App\Services;

use App\Enums\ListingStatusEnum;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\User;
use App\Services\Interfaces\ListingServiceInterface;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\UploadedFile;
use Storage;

/**
 * Class ListingService
 *
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

        $imageName = uniqid() . "_" . $image->getBasename() . '.' . $image->extension();
        $image->storeAs(('public/images'), $imageName);
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

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function checkListingStatus(Listing $listing): void
    {
        $date1 = new DateTime('now');
        $date2 = new DateTime($listing->ending);
        $interval = $date2->diff($date1);

        if ($interval->invert <= 0) {
            $listing->setAttribute('status', ListingStatusEnum::ENDED);
            $listing->save();
            return;
        }

        if (($interval->days <= 1 && $interval->h == 0) || ($interval->days == 0 && $interval->h <= 23)) {
            $listing->setAttribute('status', ListingStatusEnum::SOON_ENDING);
            $listing->save();
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function addTimeToListing(Listing $listing): void
    {
        $date2 = Carbon::createFromFormat('Y-m-d H:i:s', $listing->ending);

        if ($date2->isCurrentMinute()) {
            $date2->addSeconds(10);
            $listing->setAttribute('ending', $date2);
            $listing->save();
        }
    }
}
