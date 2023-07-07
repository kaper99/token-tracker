<?php

namespace App\Providers;

use App\Repositories\BinanceExchange;
use App\Repositories\ExchangeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ExchangeRepository::class, BinanceExchange::class);
    }
}
