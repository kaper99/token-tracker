<?php

namespace App\Repositories;

class TokenRepository
{
    public function __construct(public ExchangeRepository $exchangeRepository)
    {
    }

    public function getCurrentPrice(string $symbol)
    {
        return $this->exchangeRepository->getCurrentPrice($symbol);
    }
}
