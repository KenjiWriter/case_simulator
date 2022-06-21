<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Barryvdh\Debugbar\Facades\Debugbar;

class Inventory extends Component
{
    public $items;

    public function sellItem($key) 
    {
        $item = $this->items[$key];
        $user = User::find(auth()->user()->id);
        $user->money += $item['price'];
        unset($this->items[$key]);
        $items = json_encode($this->items);
        $user['items'] = $items;
        $user->save();
        
    }

    public function render()
    {
        $inventory = User::select('items')->find(auth()->user()->id);
        $items = json_decode($inventory['items'], true);
        $this->items = $items;
        return view('livewire.user.inventory');
    }
}
