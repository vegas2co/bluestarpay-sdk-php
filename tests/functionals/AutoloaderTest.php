<?php

use PHPUnit\Framework\TestCase;

final class AutoloaderTest extends TestCase
{
    public function testAutoloader()
    {
        try {
            include(__DIR__.'/../../lib/payments-sdk.php');

            $BlueStarPay = new BlueStar\Payments\BlueStarPay('fake-public-key', 'fake-private-key');

            $this->assertNotNull($BlueStarPay);
        } catch (\Throwable $t) {
            $this->fail('Payments SDK autoload failed: '. $t->getMessage());
        }
    }
}
