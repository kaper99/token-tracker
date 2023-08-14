<?php

namespace App\Livewire;

use App\Models\Vault;
use App\Repositories\TokenRepository;
use Livewire\Component;

class VaultComponent extends Component
{
    public Vault $vault;
    protected TokenRepository $tokenRepository;
    public array $assetPrices = [];

    public function render()
    {
        return view('livewire.vault-component');
    }

    public function boot(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function mount()
    {
        $this->vault = \Auth::user()->vault;
        $currencyPairs = $this->vault->assets()->with('token')->get()->map(function ($asset){
            return $asset->token->currency.'USDT';
        })->toArray();
        $this->assetPrices = $this->tokenRepository->getCurrentPrices($currencyPairs);
    }
}
