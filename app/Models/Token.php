<?php

namespace App\Models;

use App\Repositories\ExchangeRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['currency', 'slug', 'coinmarketcap_id', 'name'];
}
