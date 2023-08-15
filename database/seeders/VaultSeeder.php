<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Token;
use App\Models\User;
use App\Models\Vault;
use Illuminate\Database\Seeder;

class VaultSeeder extends Seeder
{
    public function run(): void
    {
        $vault = Vault::create([
            'user_id' => User::first()->id
        ]);

        Token::all()->each(function (Token $token) use ($vault) {
            $vault->assets()->save(Asset::create([
                'token_id' => $token->id,
                'vault_id' => $vault->id,
                'purchase_price' => rand(10, 100) / 10,
                'quantity' => rand(10, 100) / 10
            ]));
        });
    }
}
