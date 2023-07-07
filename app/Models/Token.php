<?php

namespace App\Models;

use App\Repositories\ExchangeRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function getCurrentPrice(ExchangeRepository $exchangeRepository, string $counterCurrency = 'USDT')
    {
        $response = $exchangeRepository->getCurrentPrice($this->symbol, $counterCurrency);
        return $response['price'];
    }
}
