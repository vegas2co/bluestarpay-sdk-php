<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class CustomerTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\Customer::class;

    public function test_id() { $this->full( "id", "int", false); }

}
