<?php

namespace App\Repositories;

use App\Requests\Binance\GetSymbolPriceRequest;
use App\Services\RequestProcessors\ProcessRequestService;

class BinanceExchange implements ExchangeRepository
{
    public function getCurrentPrice(string $symbol): string
    {
        return (new ProcessRequestService)(new GetSymbolPriceRequest($symbol))->price;
    }
}
