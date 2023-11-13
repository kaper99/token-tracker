<?php

namespace App\Livewire;

use App\Models\Vault;
use App\Repositories\TokenRepository;
use App\VaultProviders\CoinMarketCap\Requests\GetPortfolioTokensRequest;
use App\VaultProviders\CoinMarketCap\Services\CoinMarketCapRequestProcessor;
use App\VaultProviders\Enums\VaultProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

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

    public function synchronize(string $provider, string $portfolioId)
    {
        if (!in_array($provider, VaultProvider::toArray())) {
            Toaster::error('Invalid provider');
            return;
        }

        $this->vault->update([
            'coinmarketcap_id' => $portfolioId
        ]);

        $req = new GetPortfolioTokensRequest('64384ecac4c09726ecf1d6c5');
        (resolve(CoinMarketCapRequestProcessor::class))->process($req);
    }
}
