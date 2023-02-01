<?php

namespace App\Http\Controllers\API;

use App\Enums\ListingStatusEnum;
use App\Events\ListingPriceEvent;
use App\Events\ListingStatusEvent;
use App\Exceptions\ControllerException;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\MakePaymentRequest;
use App\Http\Requests\StoreBidRequest;
use App\Models\Listing;
use App\Models\Payment;
use App\Services\Interfaces\ListingServiceInterface;
use App\Services\Interfaces\PaymentServiceInterface;
use App\Services\ListingService;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;

/**
 * PaymentController.
 *
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class PaymentController extends Controller
{
    /**
     * @param PaymentServiceInterface $service
     * @param ListingServiceInterface $listingService
     */
    public function __construct(
        protected PaymentServiceInterface $service = new PaymentService(),
        protected ListingServiceInterface $listingService = new ListingService(),
    ) {
        $this->middleware('auth:sanctum');
    }

    /**
     * @param MakePaymentRequest $request
     *
     * @return JsonResponse
     * @throws ControllerException
     * @throws Exception
     */
    public function makePayment(MakePaymentRequest $request): JsonResponse
    {
        $listing = Listing::find($request->input('listing_id'));
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $request->input('listing_id') . ' not found', 400);
        }

        $this->listingService->checkListingStatus($listing);
        if ($listing->status != ListingStatusEnum::ENDED->value) {
            throw new ControllerException(
                'Listing with id: ' . $request->input('listing_id') . ' has not ended yet',
                400
            );
        }

        if ($listing->sold) {
            throw new ControllerException(
                'Listing with id: ' . $request->input('listing_id') . ' has been sold',
                400
            );
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $token = Token::create([
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => $request->input('exp_month'),
                    'exp_year' => $request->input('exp_year'),
                    'cvc' => $request->input('cvc'),
                ],
            ]);

            $charge = Charge::create([
                'amount' => $listing->price . 0 . 0,
                'currency' => 'czk',
                'source' => $token,
                'description' => 'Charge for product ' . $listing->name . ' from ZaNákupku.cz',
            ]);
        } catch (Exception $exception) {
            throw new ControllerException($exception->getMessage(), 400);
        }

        $listing->setAttribute('sold', true);
        $listing->save();

        return $this->response($charge->status, 200);
    }

    /**
     * @param StoreBidRequest $request
     *
     * @return JsonResponse
     * @throws ControllerException
     * @throws ServiceException
     * @throws Exception
     */
    public function bid(StoreBidRequest $request): JsonResponse
    {
        $listing = Listing::find($request->input('listing_id'));
        if (!($listing instanceof Listing)) {
            throw new ControllerException('Listing with id: ' . $request->input('listing_id') . ' not found', 400);
        }

        $this->listingService->checkListingStatus($listing);
        if ($listing->status == ListingStatusEnum::ENDED->value) {
            throw new ControllerException(
                'Listing with id: ' . $request->input('listing_id') . ' has ended',
                400
            );
        }

        $payment = new Payment([
            'user_id' => $request->input('user_id'),
            'listing_id' => $request->input('listing_id'),
            'amount' => $request->input('amount'),
        ]);

        $this->service->checkPayment($payment, $listing);
        $this->listingService->addTimeToListing($listing);

        $listing->setAttribute('price', $payment->amount);
        $listing->save();
        $payment->save();

        event(new ListingPriceEvent($payment->amount, $listing->id, $payment->user));
        event(
            new ListingStatusEvent(
                $listing->id, ListingStatusEnum::getStatus($listing->status),
                $listing->ending
            )
        );

        return $this->response([], 200);
    }
}
