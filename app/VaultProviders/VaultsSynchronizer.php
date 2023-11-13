<?php

namespace App\VaultProviders;

interface VaultsSynchronizer
{
    public function synchronize(int $vaultId, string $externalId);
}
