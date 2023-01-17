<?php

namespace App\Services\Interfaces;

use App\Models\Listing;
use App\Models\Payment;

/**
 * Interface PaymentServiceInterface
 *
 * @package App\Services\Interfaces
 */
interface PaymentServiceInterface
{
    public function checkPayment(Payment $payment, Listing $listing): void;
}
