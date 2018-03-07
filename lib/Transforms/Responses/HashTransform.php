<?php

namespace BlueStar\Payments\Transforms\Responses;

use BlueStar\Payments\Exceptions;

trait HashTransform
{
    public function responseHash($response)
    {
        if (! array_key_exists('HashMethod', $response->headers()) ||
            ! array_key_exists('Hash', $response->headers())
        ) {
            throw new Exceptions\HashValidationException;
        }

        if (hash('sha256', $response->rawBody().$response->hashKey()) != $response->headers()['Hash']) {
            throw new Exceptions\HashValidationException;
        }

        return true;
    }
}
