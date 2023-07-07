<?php

namespace App\Services\RequestProcessors;

use App\Requests\ExternalRequest;
use App\Responses\ExternalResponse;

abstract class RequestProcessor
{
    public function __invoke(ExternalRequest $request): ExternalResponse
    {
    }
}
