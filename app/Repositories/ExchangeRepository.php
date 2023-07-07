<?php

namespace App\Repositories;



interface ExchangeRepository
{
    public function getCurrentPrice(string $symbol): string;
}
