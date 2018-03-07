<?php

namespace BlueStar\Payments\Transforms\Requests\Structures;

trait CaptureTransform
{
    public function requestCapture($transaction)
    {
        $body = [
            'Merchant'  => $transaction->object()->merchant()->id(),
            'Order'     => [
                'OriginalTransaction'   => $transaction->object()->originalTransaction()->id(),
                'Transaction'           => [
                    'Type'   => 'Capture',
                    'Amount' => $transaction->object()->amount()
                ]
            ]
        ];

        if ($transaction->object()->split() &&
            $transaction->object()->split()->amount()
        ) {
            $body['Order']['Transaction']['SplitAmount'] = $transaction->object()->split()->amount();

            if ($transaction->object()->split()->merchant()) {
                $body['Order']['Transaction']['SplitMerchant'] = $transaction->object()->split()->merchant()->id();
            }
        }

        $transaction->request()->body($body);
    }
}
