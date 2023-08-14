<div class=" py-6 px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-4 gap-4 text-center ">
        @foreach($vault->assets as $asset)
            <livewire:asset-component :id="$asset->id"/>
        @endforeach
    </div>

</div>
