<?php

namespace App\Services;

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
    public function checkPaymentAmount(Payment $payment, Listing $listing): void
    {
        if ($payment->amount <= $listing->highestPaymentAmount()) {
            throw new ServiceException(
                'Cannot submit bid lower than current price',
                400
            );
        }
    }
}
