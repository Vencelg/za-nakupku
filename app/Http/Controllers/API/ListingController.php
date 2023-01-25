<?php

namespace App\Http\Controllers\API;

use App\Enums\ListingStatusEnum;
use App\Events\ListingPriceEvent;
use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\ListingService;
use Exception;
use Illuminate\Http\JsonResponse;
use Storage;

class ListingController extends Controller
{
    public function __construct(
        protected ListingServiceInterface $service = new ListingService()
    ) {
        $this->middleware(['auth:sanctum', 'verified'])->except(['index', 'show', 'checkAllListingStatuses']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $code = request('category');
        $category = is_string($code) ? Category::whereCode(request('category'))->first() : null;
        $listings = Listing::all();

        return $this->response([
            'category' => $category,
            'listings' => $listings
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreListingRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreListingRequest $request): JsonResponse
    {
        $newListing = new Listing([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'info' => $request->input('info'),
            'price' => $request->input('price'),
            'phone_number' => $request->input('phone_number'),
            'location' => $request->input('location'),
            'ending' => $request->input('ending')
        ]);
        $newListing->save();

        $images = $request->file('images');
        if ($images !== null) {
            foreach ($images as $image) {
                $this->service->saveListingImages($image, $newListing);
            }
        }

        return $this->response($newListing, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     * @throws Exception
     */
    public function show(int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        if ($listing->status != ListingStatusEnum::ENDED) {
            $this->service->checkListingStatus($listing);
        }

        //$this->service->isFavouriteByAuthedUser($listing);

        return $this->response($listing, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateListingRequest $request
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     * @throws Exception
     */
    public function update(UpdateListingRequest $request, int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        if ($listing->status != ListingStatusEnum::ENDED) {
            $this->service->checkListingStatus($listing);
        }

        $listing->update($request->all());
        $listing->save();

        return $this->response($listing, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     * @throws ControllerException
     */
    public function destroy(int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $this->service->deleteListingImages($listing);
        $listing->delete();
        return $this->response([], 200);
    }

    /**
     * @throws Exception
     */
    public function checkAllListingStatuses(): JsonResponse
    {
        $listings = Listing::get();

        foreach ($listings as $listing) {
            $this->service->checkListingStatus($listing);
        }

        return $this->response([], 200);
    }
}
