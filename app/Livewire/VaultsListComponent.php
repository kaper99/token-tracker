<?php

namespace App\Livewire;

use App\Models\Vault;
use Illuminate\Support\Collection;
use Livewire\Component;

class VaultsListComponent extends Component
{
    /**@var Collection<Vault> $userVaults */
    public Collection $userVaults;

    public function mount()
    {
        $this->userVaults = collect();
//        $this->userVaults = \Auth::user()->vaults;
    }

    public function render()
    {
        return view('livewire.vaults-list-component');
    }
}
