<div>
    <div class="row justify-content-center text-center m-1">
        @if (isset($win))
                @if ($win == true)
                <div class="alert alert-success" role="alert">
                    You won {{ $winItem['name'] }} for {{ $winItem['price'] }}$
                @else
                <div class="alert alert-danger" role="alert">
                    You lose! 
                @endif
            </div>
        @endif
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Select item to upgrade</p>
                    @if (isset($selectedItem))
                        <p class="card-text">{{ $selectedItem['name'] }}</p>
                        <p class="card-text">{{ $selectedItem['price'] }} $</p>
                        <button class="btn btn-success" wire:click.prevent="changeItem">Change item</button>
                    @else
                        <div class="row">
                            @foreach ($items as $k => $item)
                                <div class="col-sm-6 col-md-4 mb-3">
                                    <div class="card border text-center">
                                        <div class="card-header">{{ $item['name'] }}</div>
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $item['price'] }}$</p>
                                                <button class="btn btn-success" wire:click.prevent="selectItem({{ $k }})">Select</button>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> 
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card">
                <div class="card-body">
                    @if (isset($selectedUpgradeItem))
                        <p class="card-header">result</p>
                        <p class="card-text">Chances {{  $chances }} %</p>
                        <button class="btn btn-success" wire:click.prevent="upgradeItem">Upgrade</button>
                    @else
                        
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Select item to upgrade</p>
                    @if (isset($selectedItem))
                        @if(isset($selectedUpgradeItem))
                            <p class="card-text">{{ $selectedUpgradeItem['name'] }}</p>
                            <p class="card-text">{{ $selectedUpgradeItem['price'] }} $</p>
                            <button class="btn btn-success" wire:click.prevent="changeUpgradedItem">Change item</button>
                        @else
                            <input class="form-control" wire:model="search" type="search" placeholder="Search item">
                            <div class="row mt-3">
                                @foreach ($upgradeItems as $k => $item)
                                    <div class="col-sm-6 col-md-4 mb-3">
                                        <div class="card border text-center">
                                            <div class="card-header">{{ $item['name'] }}</div>
                                                <div class="card-body">
                                                    <p class="card-text text-center">{{ $item['price'] }}$</p>
                                                    <button class="btn btn-success" wire:click.prevent="selectItemUpgrade({{ $k }})">Select</button>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> 
                        @endif
                    @else
                        <p class="card-text">Select item to upgrade first</p>
                    @endif
                </div>
            </div>
        </div>
    </div>   
</div>
