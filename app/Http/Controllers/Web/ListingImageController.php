<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteListingImageRequest;
use App\Http\Requests\StoreListingImageRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\ListingService;
use Illuminate\Http\Request;
use Storage;

class ListingImageController extends Controller
{
    public function __construct(
        protected ListingServiceInterface $service = new ListingService()
    ) {
    }

    public function store(StoreListingImageRequest $request, int $id)
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $images = $request->file('images');
        if ($images !== null) {
            foreach ($images as $image) {
                $this->service->saveListingImages($image, $listing);
            }
        }

        return redirect()->back()->with('success', 'Images successfully added');
    }

    public function delete(int $listingId, int $imageId)
    {
        $listing = Listing::find($listingId);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $listingId . ' not found', 400);
        }

        $image = ListingImage::whereId($imageId)->whereListingId($listingId)->first();
        if (!($image instanceof ListingImage)) {
            throw new ControllerException('ListingImage with id: ' . $imageId . ' not found', 400);
        }

        Storage::delete('public/images/' . $image->name);
        $image->delete();

        return redirect()->back()->with('success', 'Image successfully deleted');
    }
}

