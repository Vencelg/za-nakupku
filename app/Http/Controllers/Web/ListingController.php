<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\ListingService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(protected ListingServiceInterface $service = new ListingService())
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('main.listing.list', [
            'listings' => Listing::withTrashed()->get()->sortBy('id')
        ]);
    }

    public function create()
    {
        return view('main.listing.create');
    }

    public function store(StoreListingRequest $request)
    {
        $ending = str_replace(
                '/',
                '-',
                $request->input('ending_date')
            ) .
            ' ' .
            $request->input('ending_time')
            . ':00';

        $endingFormated = Carbon::createFromFormat('d-m-Y H:i:s', $ending);

        $newListing = new Listing([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'info' => $request->input('info'),
            'price' => $request->input('price'),
            'phone_number' => $request->input('phone_number'),
            'location' => $request->input('location'),
            'ending' => $endingFormated->format('Y-m-d H:i:s')
        ]);
        $newListing->save();

        $images = $request->file('images');
        if ($images !== null) {
            foreach ($images as $image) {
                $this->service->saveListingImages($image, $newListing);
            }
        }

        return redirect()->route('listing.detail', ['id' => $newListing->id]);
    }

    public function show(
        int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $listing = Listing::withTrashed()->with('listingImages')->whereId($id)->first();
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $this->service->checkListingStatus($listing);

        return view('main.listing.detail', [
            'listing' => $listing,
        ]);
    }

    public function update(int $id, UpdateListingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $listing = Listing::withTrashed()->whereId($id)->first();
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $listing->update($request->all());
        $listing->save();

        return redirect()->back()->with('success', 'Model successfully updated');
    }

    public function restore(int $id)
    {
        $listing = Listing::withTrashed()->whereId($id)->first();
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $listing->setAttribute('deleted_at', null);
        $listing->save();

        return redirect()->back()->with('success', 'Model successfully restored');
    }

    public function softDelete(int $id)
    {
        $listing = Listing::withTrashed()->whereId($id)->first();
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $id . ' not found', 400);
        }

        $listing->delete();

        return redirect()->back()->with('success', 'Model successfully deleted');
    }

    public function delete(int $id)
    {
        $listing = Listing::withTrashed()->whereId($id)->first();
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $listing->forceDelete();

        return redirect()->route('listing');
    }
}
