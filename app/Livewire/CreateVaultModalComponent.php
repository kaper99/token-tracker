<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CreateVaultModalComponent extends ModalComponent
{
    public string $name;

    public function render()
    {
        return view('livewire.create-vault-modal-component');
    }

    public function save()
    {
        \Auth::user()->vaults()->create([
                'name' => $this->name
            ]
        );

        $this->closeModal();
        Toaster::success('Utworzono');
    }
}
