<?php

namespace App\VaultProviders\CoinMarketCap;

use App\Models\Asset;
use App\Models\Token;
use App\Models\Vault;
use App\VaultProviders\CoinMarketCap\Requests\GetPortfolioTokensRequest;
use App\VaultProviders\CoinMarketCap\Responses\GetPortfolioTokensResponse;
use App\VaultProviders\CoinMarketCap\Services\CoinMarketCapRequestProcessor;
use App\VaultProviders\VaultsSynchronizer;

class CoinMarketCapVaultSynchronizer implements VaultsSynchronizer
{
    public function synchronize(int $vaultId, string $externalId)
    {
        $vault = Vault::findOrFail($vaultId);
        $vault->update([
            'coinmarketcap_id' => $externalId
        ]);

        $req = new GetPortfolioTokensRequest($externalId);
        /**@var GetPortfolioTokensResponse $response */
        $response = (resolve(CoinMarketCapRequestProcessor::class))->process($req);

        foreach ($response->tokens as $coinmarketcapToken) {

            $token = Token::where('coinmarketcap_id', $coinmarketcapToken->cryptocurrencyId)->first();
            if (!$token) {
                $token = Token::create([
                    'name' => $coinmarketcapToken->name,
                    'slug' => $coinmarketcapToken->slug,
                    'currency' => $coinmarketcapToken->symbol,
                    'coinmarketcap_id' => $coinmarketcapToken->cryptocurrencyId,
                ]);
            }

            $asset = Asset::where([
                'vault_id' => $vaultId,
                'token_id' => $token->id
            ])->first();

            if (!$asset) {
                Asset::create([
                    'token_id' => $token->id,
                    'vault_id' => $vaultId,
                ]);
            }
        }
    }
}
