<?php

namespace App\Http\Livewire\Upgrader;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Barryvdh\Debugbar\Facades\Debugbar;

class Searchinventory extends Component
{
    public $items, $selectedItem,
        $upgradeItems, $selectedUpgradeItem,
        $selectedKey, $winItem,
        $search, $chances, $win;

    public function selectItem($key)
    {
        $item =  $this->items[$key];
        $this->selectedItem = $item;
        $this->selectedKey = $key;
    }

    public function selectItemUpgrade($key)
    {
        $this->selectedUpgradeItem = $this->upgradeItems[$key];
    }

    public function changeItem()
    {
        unset($this->selectedItem);
        unset($this->selectedUpgradeItem);
    }

    public function changeUpgradedItem()
    {
        unset($this->selectedUpgradeItem);
    }
    
    public function upgradeItem()
    {
        if(isset($this->selectedUpgradeItem)) {
            $chances = $this->chances;
            $win = (rand(0, 10000) / 10000) *100;
            $user = User::find(auth()->user()->id);
            $items = $this->items;
            unset($items[$this->selectedKey]);
            $user->items = json_encode($items);
            $user->save();
            if($chances >= $win) {
                $winItem = $this->selectedUpgradeItem;
                $add_item = [   // Create array to insert to DB
                    'id' => $winItem["id"], 
                    'name' => $winItem["name"],
                    'price' => $winItem["price"]
                ];
                $this->items[] = $add_item;
                $user->items = json_encode($this->items);
                $this->winItem = $this->selectedUpgradeItem;
                $this->win = true;
            } else {
                $this->win = false;
            }
            $user->save();
            unset($this->selectedItem);
            unset($this->selectedUpgradeItem);
        }
    }

    public function render()
    {
        $items = User::select('items')->find(auth()->user()->id);
        $items = json_decode($items['items'], true);
        $this->items = $items;

        if(isset($this->selectedItem)){
            $search = $this->search;
            $upgradeItems = Item::where('name', 'like', "%$search%")
                                ->where('price', '>', $this->selectedItem['price'])
                                ->get();
            $this->upgradeItems = $upgradeItems;
        }

        if(isset($this->selectedUpgradeItem)) {
            $chances = ($this->selectedItem['price'] / $this->selectedUpgradeItem['price']) * 100;
            $chances = round($chances, 2);
            $this->chances = $chances;
        }
        return view('livewire.upgrader.searchinventory');
    }
}
