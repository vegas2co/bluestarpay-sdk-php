<?php

namespace BlueStar\Payments\Transforms\Responses;

trait JSONTransform
{
    public function responseJSON($response)
    {
        $response->body(json_decode($response->raw(), true));
    }
}
