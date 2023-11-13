<?php

namespace App\Responses\Binance;

use App\Exceptions\ExternalResponse\ExternalSystemCriticalErrorException;
use App\Exceptions\ExternalResponse\InvalidPair;
use GuzzleHttp\Psr7\Response;

abstract class BaseBinanceResponse
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
        if ($this->response->getStatusCode() == 400) {
            throw new InvalidPair('Pair not found');
        }

        if ($this->response->getStatusCode() >= 500) {
            \Log::error('Binance does not work properly.', [
                'occurred-in' => get_class($this)
            ]);
            throw new ExternalSystemCriticalErrorException(__('Binance does not work properly.'));
        }
    }

    abstract protected function parseResponse();
}
