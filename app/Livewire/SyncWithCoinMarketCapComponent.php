<?php

namespace App\Livewire;

use App\Models\Vault;
use App\VaultProviders\CoinMarketCap\Services\VaultSynchronizerFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class SyncWithCoinMarketCapComponent extends ModalComponent
{
    use AuthorizesRequests;

    public ?string $portfolioId = null;
    public int $vaultId;
    public Vault $vault;
    protected VaultSynchronizerFactory $vaultsSynchronizerFactory;

    public function boot(VaultSynchronizerFactory $vaultSynchronizerFactory)
    {
        $this->vaultsSynchronizerFactory = $vaultSynchronizerFactory;
    }

    public function render()
    {
        return view('livewire.sync-with-coin-market-cap-component');
    }

    public function mount(int $vaultId)
    {
        $this->vault = Vault::findOrFail($vaultId);
        $this->authorize('update', $this->vault);
        $this->portfolioId = $this->vault->coinmarketcap_id;
    }

    #[On('synchronize-vault')]
    public function synchronize(string $provider = 'coinmarketcap')
    {
        $this->authorize('update', $this->vault);
        $this->vaultsSynchronizerFactory->create($provider)->synchronize($this->vaultId, $this->portfolioId);
        \Toaster::success('Sukces!');
    }
}
