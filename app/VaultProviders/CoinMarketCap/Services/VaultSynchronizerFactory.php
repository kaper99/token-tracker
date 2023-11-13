<?php

namespace App\VaultProviders\CoinMarketCap\Services;

use App\VaultProviders\CoinMarketCap\CoinMarketCapVaultSynchronizer;
use App\VaultProviders\Enums\VaultProvider;
use App\VaultProviders\VaultsSynchronizer;

class VaultSynchronizerFactory
{
    public function create(string $provider, array $data = []): VaultsSynchronizer
    {
        return match ($provider) {
            VaultProvider::COIN_MARKET_CAP->value => new CoinMarketCapVaultSynchronizer
        };
    }
}
