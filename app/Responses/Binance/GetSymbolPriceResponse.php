<?php

namespace App\Responses\Binance;

class GetSymbolPriceResponse extends BaseBinanceResponse implements BinanceResponse
{
    public string $price;

    protected function parseResponse()
    {
        $this->price = $this->responseArrayed['price'];
    }
}
