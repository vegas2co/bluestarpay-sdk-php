<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class PaymentMethodTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\PaymentMethod::class;

    public function test_status() { $this->full( "status", "int", false); }
    public function test_id() { $this->full( "id", "int", false); }
    public function test_customer() { $this->full( "customer", Structures\Customer::class, true); }
    public function test_account() { $this->full( "account", Structures\Account::class, true); }
}
