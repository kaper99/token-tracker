<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TokenSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            'BTC' => 'Bitcoin',
            'ETH' => 'Etherum',
            'ARB' => 'Arbitrum',
            'GRT' => 'The Graph'
        ])->each(function (string $name, string $currency) {
            Token::factory()->create([
                'name' => $name,
                'currency' => $currency,
                'slug' => Str::slug($name)
            ]);
        });
    }
}
