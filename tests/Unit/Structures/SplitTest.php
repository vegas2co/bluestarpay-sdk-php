<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class SplitTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\Split::class;

    public function test_merchant() { $this->full( "merchant", Structures\Merchant::class, true); }
    public function test_amount() { $this->full( "amount", "int", false); }

    // Merchant
    // Amount

}
