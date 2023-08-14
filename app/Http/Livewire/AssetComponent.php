<?php

namespace App\Http\Livewire;

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
        return (double)$this->tokenRepository->getCurrentPrice($this->asset->token->currency . 'USDT');
    }
}
