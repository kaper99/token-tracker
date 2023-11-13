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
    public array $assets = [];

    public function render()
    {
        return view('livewire.vault-component');
    }

    public function boot(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function mount(int $vaultId, bool $onList = false)
    {
        $this->onList = $onList;
        $this->vault = Vault::findOrFail($vaultId);
        $this->authorize('view', $this->vault);
    }

    public function synchronize(string $provider = 'coinmarketcap'): void
    {
        $this->dispatch('synchronize-vault', provider: $provider);
    }
}
