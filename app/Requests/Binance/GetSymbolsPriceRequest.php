<?php

namespace App\Requests\Binance;

class GetSymbolsPriceRequest implements BinanceRequest
{
    public function __construct(public array $symbols)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return config('binance.path') . '/v3/ticker/price?symbols=' . json_encode($this->symbols);
    }

    public function getBody(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return [];
    }
}
