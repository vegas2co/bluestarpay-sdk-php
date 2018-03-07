<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Sale extends Auth implements Interfaces\Sale
{
    public $type;

    public function type()
    {
        return 'Sale';
    }
}
