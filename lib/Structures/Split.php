<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Split implements Interfaces\Split
{
    public $merchant;
    public $amount;

    public function merchant()
    {
        return $this->merchant;
    }

    public function amount()
    {
        return $this->amount;
    }

    // ------

    public function setMerchant(Interfaces\Merchant $merchant = null)
    {
        $this->merchant = $merchant;

        return $this;
    }

    public function setAmount($amount = null)
    {
        $this->amount = $amount;

        return $this;
    }

    // ---------

    public function createMerchant()
    {
        if (! $this->merchant) {
            $this->merchant = new Merchant();
        }

        return $this->merchant;
    }
}
