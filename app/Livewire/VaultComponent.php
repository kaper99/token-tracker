<?php

namespace App\Livewire;

use App\Models\Vault;
use App\Repositories\TokenRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class VaultComponent extends Component
{
    use AuthorizesRequests;

    public Vault $vault;
    protected TokenRepository $tokenRepository;
    public array $assetPrices = [];
    public bool $onList = false;

    public function render()
    {
        return view('livewire.vault-component');
    }

    public function boot(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function mount(int $vaultId, bool $onList)
    {
        $this->onList = $onList;
        $this->vault = Vault::findOrFail($vaultId);
        $this->authorize('view', $this->vault);
        $currencyPairs = $this->vault->assets()->with('token')->get()->map(function ($asset) {
            return $asset->token->currency . 'USDT';
        })->toArray();
        $this->assetPrices = $this->tokenRepository->getCurrentPrices($currencyPairs);
    }
}
