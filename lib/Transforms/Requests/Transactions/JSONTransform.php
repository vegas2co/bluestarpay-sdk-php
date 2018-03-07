<?php

namespace BlueStar\Payments\Transforms\Requests\Transactions;

trait JSONTransform
{
    public function requestJSON($request)
    {
        $request->appendHeaders(['Content-Type' => 'application/json']);
    }
}
