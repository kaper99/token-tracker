<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TokensList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TokensListTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TokensList::class);

        $component->assertStatus(200);
    }
}
