<?php

namespace App\VaultProviders\CoinMarketCap\Responses;

use App\VaultProviders\CoinMarketCap\DTOs\CoinMarketCapVaultTokenDTO;

class GetPortfolioTokensResponse extends BaseCoinMarketCapResponse
{
    /**@var array<CoinMarketCapVaultTokenDTO> $tokens */
    public array $tokens = [];

    protected function parseResponse()
    {
        $this->parseTokens();
    }

    protected function parseTokens()
    {
        if (!isset($this->responseArrayed['data']['manualSummary'][0]['list'])) {
            return;
        }

        $tokensList = $this->responseArrayed['data']['manualSummary'][0]['list'];

        foreach ($tokensList as $token) {
            $this->tokens[] = new CoinMarketCapVaultTokenDTO(
                $token['symbol'],
                $token['name'],
                $token['slug'],
                $token['cryptocurrencyId']
            );
        }
    }
}
