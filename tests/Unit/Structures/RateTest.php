<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class RateTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\Rate::class;

    public function test_feeRate() { $this->full( "feeRate", "string", false); }
    public function test_feeTransaction() { $this->full( "feeTransaction", "string", false); }
    public function test_feeNotes() { $this->full( "feeNotes", "string", false); }
}
