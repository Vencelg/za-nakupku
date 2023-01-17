<?php

namespace App\Services;

use App\Enums\ListingStatusEnum;
use App\Exceptions\ServiceException;
use App\Models\Listing;
use App\Models\Payment;
use App\Services\Interfaces\PaymentServiceInterface;

/**
 * Class PaymentService
 *
 * @package App\Services
 */
class PaymentService implements PaymentServiceInterface
{

    /**
     * @throws ServiceException
     */
    public function checkPayment(Payment $payment, Listing $listing): void
    {
        if ($listing->status === ListingStatusEnum::ENDED) {
            throw new ServiceException(
                'Cannot submit bid to an ended listing',
                400
            );
        }

        if ($payment->amount <= $listing->highestPaymentAmount()) {
            throw new ServiceException(
                'Cannot submit bid lower than current price',
                400
            );
        }
    }
}
