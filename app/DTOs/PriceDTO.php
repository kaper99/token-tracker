<?php

namespace App\DTOs;

class PriceDTO
{
    public string $symbol;

    public function __construct(
        public string $currency,
        public string $counterCurrency,
        public string $price
    )
    {
        $this->symbol = $currency . $counterCurrency;
    }
}
