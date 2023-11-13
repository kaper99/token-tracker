<?php

namespace App\VaultProviders\CoinMarketCap\Requests;

interface CoinMarketCapRequest
{
    public function getMethod(): string;

    public function getPath(): string;

    public function getBody(): array;
}
