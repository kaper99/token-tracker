<?php

namespace App\VaultProviders\CoinMarketCap\Responses;

class GetPortfolioTokensResponse extends BaseCoinMarketCapResponse
{
    protected function parseResponse()
    {
        dd($this->responseArrayed);
        $this->price = $this->responseArrayed['price'];
    }
}
