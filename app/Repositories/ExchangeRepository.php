<?php

namespace App\Repositories;

interface ExchangeRepository
{
    public function getCurrentPrice(string $symbol): string;
    public function getCurrentPrices(array $currencyPairs): array;
}
