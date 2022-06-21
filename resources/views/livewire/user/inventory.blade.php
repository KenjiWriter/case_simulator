<div class="row">
    @foreach ($items as $k => $item)
    <div class="col-sm-6 col-md-4 mb-3">
        <div class="card border text-center">
            <div class="card-header">{{ $item['name'] }}</div>
                <div class="card-body">
                    <p class="card-text">float: {{ $item['float'] }}</p>
                    <p class="card-text text-center">{{ $item['price'] }}$</p>
                    <button class="btn btn-success" wire:click.prevent="sellItem({{ $k }})">SELL</button>
                </div>
            </div>
    </div>
    @endforeach
</div>
