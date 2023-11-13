<?php

namespace App\VaultProviders\CoinMarketCap\Responses;

use App\Exceptions\ExternalResponse\ExternalSystemCriticalErrorException;
use GuzzleHttp\Psr7\Response;

abstract class BaseCoinMarketCapResponse
{
    protected array $responseArrayed;
    public int $statusCode;

    public function __construct(protected Response $response)
    {
        $this->validateResponse();
        $this->decodeResponse();
        $this->statusCode = $this->response->getStatusCode();
        $this->parseResponse();
    }

    protected function decodeResponse()
    {
        $this->responseArrayed = json_decode($this->response->getBody(), true);
    }

    protected function validateResponse()
    {
        if ($this->response->getStatusCode() >= 500) {
            \Log::error('Binance does not work properly.', [
                'occurred-in' => get_class($this)
            ]);
            throw new ExternalSystemCriticalErrorException(__('CoinMarketCap does not work properly.'));
        }
    }

    abstract protected function parseResponse();
}
