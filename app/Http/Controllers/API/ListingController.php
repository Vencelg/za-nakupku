<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\ListingService;
use Illuminate\Http\JsonResponse;
use Storage;

class ListingController extends Controller
{
    public function __construct(
        protected ListingServiceInterface $service = new ListingService()
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $listings = Listing::all();

        return $this->response($listings, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreListingRequest $request
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
     * @return JsonResponse
     * @throws ControllerException
     */
    public function show(int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        return $this->response($listing, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateListingRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function update(UpdateListingRequest $request, int $id): JsonResponse
    {
        $listing = Listing::find($id);
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $listing->update($request->all());
        $listing->save();

        return $this->response($listing, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
}
