<?php

namespace App\Repositories;

use App\DTOs\PriceDTO;

interface ExchangeRepository
{
    public function getCurrentPrice(string $currency, string $counterCurrency): PriceDTO;
}
