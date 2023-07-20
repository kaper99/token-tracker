<div>
    @foreach($vault->assets as $asset)
        <livewire:asset-component :id="$asset->id"/>
    @endforeach
</div>
