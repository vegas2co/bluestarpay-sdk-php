<?php

namespace BlueStar\Payments\Transforms\Requests\Structures;

trait MerchantLimitsTransform
{
    public function requestMerchantLimits($transaction)
    {
        $transaction->request()->body([
            'Merchant' => $transaction->object()->id()
        ]);
    }
}
