<?php

namespace App\VaultProviders\CoinMarketCap\DTOs;

class CoinMarketCapVaultTokenDTO
{
    public function __construct(
        public readonly string $symbol,
        public readonly string $name,
        public readonly string  $slug,
        public readonly string $cryptocurrencyId
    )
    {
    }
}
