<div class="rounded-lg bg-indigo-600 hover:bg-gray-50">
    <div>
        <h1 class="text-center"> {{$asset->name}}</h1>
    </div>
    {{(float)$asset->quantity}} <br/>
    {{$this->getCurrentValueInUSD()}} <br/>
</div>
