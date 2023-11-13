<div class=" py-6 px-4 sm:px-6 lg:px-8">
    @if($onList)
        <div class="rounded-lg bg-indigo-600 hover:bg-gray-50 p-6">
            {{$vault->name}}
        </div>
    @else
        <button class="rounded-lg bg-indigo-600 hover:bg-gray-50 p-6 w-48 mb-5" type="button"

                @if(!empty($vault->coinmarketcap_id))
                    wire:click="synchronize('coinmarketcap')"
                @else
                    wire:click="$dispatch('openModal', { component: 'sync-with-coin-market-cap-component', arguments:{vaultId: {{$vault->id}} }})"
            @endif
        >
            Synchronize with CoinmarketCap
        </button>
        @if($vault->assets)
            <div class="grid grid-cols-4 gap-4 text-center ">
                @foreach($vault->assets as $asset)
                    <livewire:asset-component :id="$asset->id"/>
                @endforeach
            </div>
        @else
            <div class="bg-green-500 ">
                You have 0 tokens
            </div>
        @endif
    @endif
   <div class="hidden">
       <livewire:sync-with-coin-market-cap-component :vaultId="$vault->id" class="hidden"/>
   </div>
</div>
