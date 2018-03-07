<?php

namespace BlueStar\Payments\Exceptions;

class InvalidAccountTypeException extends \Exception
{
    protected $message = "The supplied AccountType is invalid";

    public function setAccountType($accountType)
    {
        $this->message = "The supplied AccountType($accountType) is invalid";
        
        return $this;
    }
}
