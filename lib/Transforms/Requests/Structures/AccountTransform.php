<?php

namespace BlueStar\Payments\Transforms\Requests\Structures;

use BlueStar\Payments\AccountTypes;
use BlueStar\Payments\Exceptions;

trait AccountTransform
{
    public function requestAccount($account)
    {
        $body = [
            'Type'       => $account->type(),
            'Number'     => $account->number(),
        ];
        switch($account->type())
        {
            case AccountTypes::AMEX:
            case AccountTypes::MASTERCARD:
            case AccountTypes::VISA:
            case AccountTypes::DISCOVER:
                $body['ExpireDate'] = $account->expireDate();
                $body['Cvv2']       = $account->cvv2();
                break;
            case AccountTypes::CHECKING:
            case AccountTypes::SAVINGS:
                $body['RoutingNumber'] = $account->routingNumber();
                break;
            default:
                throw (new Exceptions\InvalidAccountTypeException())
                    ->setAccountType($account->type());
        }
        return $body;
    }
}
