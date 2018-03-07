<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class OrderTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\Order::class;

    public function test_id() { $this->full( "id", "int", false); }

}
