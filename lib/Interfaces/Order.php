<?php

namespace BlueStar\Payments\Interfaces;

interface Order
{
    public function id();

    //-----------

    public function setID($id = null);
}
