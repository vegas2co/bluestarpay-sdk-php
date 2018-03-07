<?php

namespace BlueStar\Payments\Factories;

use BlueStar\Payments\Interfaces;
use BlueStar\Payments\Structures;

class Capture
{
    public static function previousTransaction(
        Interfaces\Transaction $originalTransaction,
        $amount,
        Interfaces\Merchant $merchant = null,
        Interfaces\Split $split = null,
        $idempotencyKey = null
    )
    {
        return (new Structures\Capture())
            ->setOriginalTransaction($originalTransaction)
            ->setMerchant($merchant ? $merchant : $originalTransaction->merchant())
            ->setAmount($amount)
            ->setSplit($split);
    }
}
