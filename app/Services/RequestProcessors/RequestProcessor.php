<?php

namespace App\Services\RequestProcessors;

use App\Requests\ExternalRequest;

abstract class RequestProcessor
{
    public function __construct(ExternalRequest $request)
    {
    }
}
