<?php

namespace App\Requests\Binance;

use App\Requests\ExternalRequest;

interface BinanceRequest extends ExternalRequest
{
    public function getMethod(): string;

    public function getPath(): string;

    public function getBody(): array;

    public function getHeaders(): array;
}
