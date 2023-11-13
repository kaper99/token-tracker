<?php

namespace App\VaultProviders\CoinMarketCap\Requests;

class GetPortfolioTokensRequest implements CoinMarketCapRequest
{
    public function __construct(protected string $portfolioId)
    {
    }

    public function getBody(): array
    {
        return [
            "portfolioSourceId" => $this->portfolioId,
            "currentPage" => 1,
            "pageSize" => 10000
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getPath(): string
    {
        return config('coinmarketcap.api-url').'/query-summary';
    }
}
