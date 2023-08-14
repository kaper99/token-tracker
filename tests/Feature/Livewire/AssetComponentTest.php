<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AssetComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AssetComponentTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AssetComponent::class);

        $component->assertStatus(200);
    }
}
