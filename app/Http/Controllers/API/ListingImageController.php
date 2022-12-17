<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteListingImageRequest;
use App\Http\Requests\StoreListingImageRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\ListingService;
use File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Storage;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class ListingImageController extends Controller
{
    public function __construct(
        protected ListingServiceInterface $service = new ListingService()
    )
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * @param StoreListingImageRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function store(StoreListingImageRequest $request, int $id): JsonResponse
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

        return $this->response($listing, 200);
    }

    /**
     * @param DeleteListingImageRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function delete(DeleteListingImageRequest $request, int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $ids = $request->input('image_ids');
        foreach ($ids as $imageId) {
            if (is_int($imageId)) {
                $image = ListingImage::whereId($imageId)->whereListingId($id)->first();
                if (!($image instanceof ListingImage)) {
                    throw new ControllerException('ListingImage with id: ' . $imageId . ' not found', 400);
                }

                Storage::delete('public/images/' . $image->name);
                $image->delete();
            }
        }

        return $this->response([], 200);
    }
}
