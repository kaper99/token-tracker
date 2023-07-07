<?php

namespace App\Requests\Binance;

class GetSymbolPriceRequest implements BinanceRequest
{
    public function __construct(public string $symbol)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getPath(): string
    {
        return config('binance.path') . '/v3/ticker/price?symbol=' . $this->symbol;
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
