<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            'BTC',
            'ETH',
            'ARB',
            'GRT'
        ])->each(function (string $currency) {
            Token::factory()->create([
                'currency' => $currency
            ]);
        });
    }
}
