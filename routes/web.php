<?php

use App\Livewire\TokensList;
use App\Livewire\VaultComponent;
use App\Livewire\VaultsListComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::view('/dashboard', 'dashboard' )->name('dashboard');
    Route::get('/vaults', VaultsListComponent::class)->name('vaults');
    Route::get('/vault/{vaultId}', VaultComponent::class)->name('vault');
});
