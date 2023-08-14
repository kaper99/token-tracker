<?php

namespace App\Repositories;

class TokenRepository
{
    public function __construct(public ExchangeRepository $exchangeRepository)
    {
    }

    public function getCurrentPrice(string $currencyPair): string
    {
        return $this->exchangeRepository->getCurrentPrice($currencyPair);
    }

    public function getCurrentPrices(array $currencyPairs): array
    {
        return $this->exchangeRepository->getCurrentPrices($currencyPairs);
    }
}
