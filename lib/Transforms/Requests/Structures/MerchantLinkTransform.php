<?php

namespace BlueStar\Payments\Transforms\Requests\Structures;

trait MerchantLinkTransform
{
    public function requestMerchantLink($transaction)
    {
        $transaction->request()->body([
            'ExternalId' => $transaction->object()->externalID(),
            'RateName'   => $transaction->object()->rate()->name()
        ]);
    }
}
