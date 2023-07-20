<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use Livewire\Component;

class AssetComponent extends Component
{
    public Asset $asset;

    public function render()
    {
        return view('livewire.asset-component');
    }

    public function mount(int $id)
    {
        $this->asset = Asset::findOrFail($id);
    }
}
