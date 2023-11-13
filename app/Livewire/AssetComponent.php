<?php

namespace App\Livewire;

use App\Exceptions\ExternalResponse\InvalidPair;
use App\Models\Asset;
use App\Repositories\TokenRepository;
use Livewire\Component;

class AssetComponent extends Component
{
    public Asset $asset;
    protected TokenRepository $tokenRepository;
    protected float $previousValue = 0;

    public function render()
    {
        return view('livewire.asset-component');
    }

    public function boot(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function mount(int $id)
    {
        $this->asset = Asset::findOrFail($id);
    }

    public function getCurrentValueInUSD(): ?float
    {
        $pair = $this->asset->token->currency . config('binance.default-stablecoin');
        try {
            if (\Cache::get($pair)) {
                return \Cache::get($pair);
            }
            $result = (double)$this->tokenRepository->getCurrentPrice($pair);

            \Cache::set($pair, $result, now()->addHour());
        } catch (InvalidPair $e) {
            \Toaster::error('Pair ' . $pair . ' not found in Binance');
            return null;
        }

        return $result;
    }
}
