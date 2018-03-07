<?php

namespace BlueStar\Payments\Factories;

use BlueStar\Payments\Interfaces;
use BlueStar\Payments\Structures;

class VoidTransaction
{
    public static function previousTransaction(Interfaces\Transaction $originalTransaction)
    {
        return (new Structures\VoidTransaction())
            ->setOriginalTransaction($originalTransaction)
            ->setMerchant($originalTransaction->merchant());
    }
}
