<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Token extends PaymentMethod implements Interfaces\Token
{
    public $token;

    public function token()
    {
        return $this->token;
    }

    //-----

    public function setToken($token = null)
    {
        $this->token = $token;

        return $this;
    }
}
