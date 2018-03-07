<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Order implements Interfaces\Order
{
    public $id;

    public function id()
    {
        return $this->id;
    }

    // --------

    public function setID($id = null)
    {
        $this->id = $id;

        return $this;
    }
}
