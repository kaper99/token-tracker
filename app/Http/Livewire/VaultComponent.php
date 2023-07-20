<?php

namespace App\Http\Livewire;

use App\Models\Vault;
use Livewire\Component;

class VaultComponent extends Component
{
    public Vault $vault;

    public function render()
    {
        return view('livewire.vault-component');
    }

    public function mount()
    {
        $this->vault = \Auth::user()->vault;
    }
}
