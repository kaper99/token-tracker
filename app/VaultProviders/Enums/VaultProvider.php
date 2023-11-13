<?php

namespace App\VaultProviders\Enums;

enum VaultProvider: string
{
    case COIN_MARKET_CAP = 'coinmarketcap';

    public static function toArray(): array
    {
        return [
            self::COIN_MARKET_CAP->value
        ];
    }
}
