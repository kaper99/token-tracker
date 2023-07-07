<?php

namespace App\Http\Livewire;

use App\Models\Token;
use App\Repositories\TokenRepository;
use Illuminate\Support\Collection;
use Livewire\Component;

class TokensList extends Component
{
    /**@var Collection<Token> $tokens */
    public Collection $tokens;

    public function render()
    {
        return view('livewire.tokens-list');
    }

    public function mount(TokenRepository $repository)
    {
        $this->tokens = Token::all()->map(function (Token $token) use ($repository) {
            $token->price = $repository->getCurrentPrice($token->currency . 'USDT');
            return $token;
        });
    }
}
