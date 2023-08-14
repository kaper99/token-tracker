<?php

namespace App\Responses\Binance;

class GetSymbolsPriceResponse extends BaseBinanceResponse implements BinanceResponse
{
    public array $prices;

    protected function parseResponse()
    {
        $this->prices = collect($this->responseArrayed)->mapWithKeys(function ($element) {
            return [$element['symbol'] => $element['price']];
        })->toArray();
    }
}
