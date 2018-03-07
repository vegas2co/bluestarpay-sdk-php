<?php

namespace BlueStar\Payments\Structures;

use BlueStar\Payments\Interfaces;

class Customer implements Interfaces\Customer
{
    public $id;

    public function id()
    {
        return $this->id;
    }

    //------

    public function setID($id = null)
    {
        $this->id = $id;

        return $this;
    }
}
