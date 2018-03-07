<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Credit extends Transaction Implements Interfaces\Credit
{
    public $type = 'Credit';

    public function type()
    {
        return 'Credit';
    }
}
