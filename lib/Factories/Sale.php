<?php

namespace BlueStar\Payments\Factories;

use BlueStar\Payments\Interfaces;
use BlueStar\Payments\Structures;

class Sale
{
    public static function withPaymentMethod(
        Interfaces\PaymentMethod $paymentMethod,
        Interfaces\Merchant      $merchant,
        $amount,
        Interfaces\Split         $split = null,
        $currency = null
    )
    {
        $sale = (new Structures\Sale())
            ->setPaymentMethod($paymentMethod)
            ->setMerchant($merchant)
            ->setAmount($amount)
            ->setSplit($split);

        if ($currency) {
            $sale->setCurrency($currency);
        }

        return $sale;
    }

    public static function withAccountDetails(
        Interfaces\Account       $account,
        Interfaces\AccountHolder $accountHolder,
        Interfaces\Merchant      $merchant,
        $amount,
        Interfaces\Customer      $customer = null,
        Interfaces\Split         $split = null,
        $currency = null
    )
    {
        $sale = (new Structures\Sale())
            ->setAccount($account)
            ->setAccountHolder($accountHolder)
            ->setMerchant($merchant)
            ->setAmount($amount)
            ->setSplit($split);

        if ($currency) {
            $sale->setCurrency($currency);
        }

        return $sale;
    }
}
