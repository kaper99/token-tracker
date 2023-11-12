<div class="flex justify-center items-center min-h-screen">
    @if($userVaults->isEmpty())
        <div  class="grid gap-4 grid-cols-1 grid-rows-2">
            <div class="text-white">
                {{__('Nie posiadasz żadnego portfela')}}
            </div>
            <button wire:click="$dispatch('openModal', { component: 'create-vault-modal-component' })">Utwórz portfel</button>
        </div>
    @else
        @foreach($userVaults as $userVault)
            <a href={{route('vault', $userVault->id)}}>
                <livewire:vault-component :vaultId="$userVault->id" :onList="true"/>
            </a>
        @endforeach
    @endif
</div>
