<?php

namespace App\Http\Livewire;

use App\Models\Token;
use Illuminate\Support\Collection;
use Livewire\Component;

class TokensList extends Component
{
    /**@var Collection<Token> $tokens*/
    public Collection $tokens;

    public function render()
    {
        return view('livewire.tokens-list');
    }

    public function mount()
    {
        $this->tokens = Token::all();
    }
}
