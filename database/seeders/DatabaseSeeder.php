<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vault;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'kacper@kacbu.pl',
        ]);

        $this->call([
            TokenSeeder::class,
            VaultSeeder::class
        ]);
    }
}
