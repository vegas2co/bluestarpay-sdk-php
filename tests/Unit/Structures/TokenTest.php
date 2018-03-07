<?php

declare(strict_types=1);

use BlueStar\Payments\Structures;

final class TokenTest extends StructureTestCase
{
    protected $struct = BlueStar\Payments\Structures\Token::class;

    public function test_token() { $this->full( "token", "string", false); }
}
