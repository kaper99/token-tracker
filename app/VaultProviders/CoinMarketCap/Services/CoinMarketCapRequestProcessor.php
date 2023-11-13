<?php

namespace App\VaultProviders\CoinMarketCap\Services;

use App\VaultProviders\CoinMarketCap\Requests\CoinMarketCapRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class CoinMarketCapRequestProcessor
{
    public function __construct(
        protected Client $httpClient
    )
    {
    }

    public function process(CoinMarketCapRequest $request, ?string $bearerToken = null)
    {
        $cookieJar = CookieJar::fromArray([
            'Authorization' => \Auth::user()->coinmarketcap_token
        ],
            '.coinmarketcap.com');

        $response = $this->httpClient->request($request->getMethod(), $request->getPath(), [
            'cookies' => $cookieJar,
            'json' => $request->getBody()
        ]);

        $responseClass = $this->resolveResponseClass($request);

        return new $responseClass($response);
    }

    protected function resolveResponseClass(CoinMarketCapRequest $request)
    {
        $requestClass = get_class($request);
        return $this->responseClasses[$requestClass] ?? str_replace('Request', 'Response', $requestClass);
    }
}
