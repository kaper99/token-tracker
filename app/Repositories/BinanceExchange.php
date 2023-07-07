<?php

namespace App\Repositories;

use App\DTOs\PriceDTO;
use Illuminate\Support\Facades\Http;

class BinanceExchange implements ExchangeRepository
{
    public function getCurrentPrice(string $currency, string $counterCurrency): PriceDTO
    {
        $response = Http::send('GET', 'https://api.binance.com/api/v3/ticker/price?symbol=' . $currency . $counterCurrency);

        if (!isset($response['price'])) {
            throw new \Exception();
        }

        return new PriceDTO($currency, $counterCurrency, $response['price']);
        dd($response->json());
    }
}
