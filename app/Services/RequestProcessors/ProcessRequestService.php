<?php

namespace App\Services\RequestProcessors;

use App\Requests\Binance\BinanceRequest;
use App\Responses\BinanceResponse;
use GuzzleHttp\Client;

class ProcessRequestService extends RequestProcessor
{
    protected array $responseClasses = [];

    public function __invoke(BinanceRequest $request): BinanceResponse
    {
        $response = (new Client)->request($request->getMethod(), $request->getPath(), [
            'headers' => $request->getHeaders(),
            'json' => $request->getBody(),
        ]);

        $responseClass = $this->resolveResponseClass($request);

        return new $responseClass($response);
    }

    protected function resolveResponseClass(BinanceRequest $request)
    {
        return $this->responseClasses[get_class($request)] ?? str_replace('Request', 'Response', get_class($request));
    }
}
