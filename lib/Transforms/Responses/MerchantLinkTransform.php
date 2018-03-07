<?php

namespace BlueStar\Payments\Transforms\Responses;

use BlueStar\Payments\Exceptions;

trait MerchantLinkTransform
{
    public function responseMerchantLink($transaction)
    {
        $transaction->object()->setLink(
            $transaction->response()->body()['URL']
        );
    }
}
