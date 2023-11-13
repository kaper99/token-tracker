<?php

namespace App\Services\RequestProcessors;

use App\Requests\Binance\BinanceRequest;
use App\Requests\ExternalRequest;
use App\Responses\Binance\BinanceResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ProcessRequestService extends RequestProcessor
{
    protected array $responseClasses = [];

    public function __invoke(ExternalRequest $request): BinanceResponse
    {
            $response = (new Client)->request($request->getMethod(), $request->getPath(), [
                'http_errors' => false
            ]);

            $responseClass = $this->resolveResponseClass($request);

        return new $responseClass($response);
    }

    protected function resolveResponseClass(BinanceRequest $request)
    {
        $requestClass = get_class($request);
        return $this->responseClasses[$requestClass] ?? str_replace('Request', 'Response', $requestClass);
    }
}
