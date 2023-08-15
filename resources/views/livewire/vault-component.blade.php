<div class=" py-6 px-4 sm:px-6 lg:px-8">
    @if($onList)
        <div class="rounded-lg bg-indigo-600 hover:bg-gray-50 p-6">
            {{$vault->name}}
        </div>
    @else
        <div class="grid grid-cols-4 gap-4 text-center ">
            @foreach($vault->assets as $asset)
                <livewire:asset-component :id="$asset->id"/>
            @endforeach
        </div>
    @endif
</div>
