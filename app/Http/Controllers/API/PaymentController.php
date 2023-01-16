<?php

namespace App\Http\Controllers\API;

use App\Enums\ListingStatusEnum;
use App\Events\ListingPriceEvent;
use App\Exceptions\ControllerException;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Listing;
use App\Models\Payment;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\Interfaces\PaymentServiceInterface;
use App\Services\ListingService;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * PaymentController.
 *
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class PaymentController extends Controller
{
    /**
     * @param PaymentServiceInterface $service
     */
    public function __construct(
        protected PaymentServiceInterface $service = new PaymentService(),
        protected ListingServiceInterface $listingService = new ListingService(),
    ) {
        $this->middleware('auth:sanctum');
    }

    /**
     * @param StorePaymentRequest $request
     *
     * @return JsonResponse
     * @throws ServiceException|ControllerException
     */
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $listing = Listing::find($request->input('listing_id'));
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $request->input('listing_id') . ' not found', 400);
        }

        if ($listing->status == ListingStatusEnum::ENDED) {
            throw new ControllerException('Listing with id: ' . $request->input('listing_id') . ' is expired', 400);
        }

        $payment = new Payment([
            'user_id' => $request->input('user_id'),
            'listing_id' => $request->input('listing_id'),
            'amount' => $request->input('amount'),
        ]);

        $this->service->checkPaymentAmount($payment, $listing);

        $listing->setAttribute('price', $payment->amount);
        $listing->save();
        $payment->save();

        event(new ListingPriceEvent($payment->amount, $listing->id, $payment->user));

        return $this->response([], 200);
    }
}
