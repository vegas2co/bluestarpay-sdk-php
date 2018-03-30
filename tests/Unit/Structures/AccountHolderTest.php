<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class AccountHolderTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\AccountHolder::class;

    public function test_name()
    {
        $this->full( "name", "string", false);
    }

    public function test_billingAddress()
    {
        $this->full( "billingAddress", Structures\Address::class, true);
    }

    // Name
    // Billing Address
    // - Address1
    // - Address2
    // - City
    // - State
    // - Zip
}
