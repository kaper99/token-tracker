<?php

namespace App\Livewire;

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

    public function getCurrentValueInUSD(): float
    {
        // @todo implement DTO with price parser
        $pair = $this->asset->token->currency . 'USDT';
        if (\Cache::get($pair)) {
            return \Cache::get($pair);
        }

        $result = (double)$this->tokenRepository->getCurrentPrice($pair);
        \Cache::set($pair, $result, now()->addHour());
        return $result;
    }
}
