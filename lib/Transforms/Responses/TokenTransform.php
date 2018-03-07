<?php

namespace BlueStar\Payments\Transforms\Responses;

trait TokenTransform
{
    public function responseToken($transaction)
    {
        $transaction->object()->setToken(
            $transaction->response()->body()['Token']
        );
    }
}
