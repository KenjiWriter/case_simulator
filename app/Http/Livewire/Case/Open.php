<?php

namespace App\Http\Livewire\Case;

use App\Models\Box;
use App\Models\User;
use Livewire\Component;

class Open extends Component
{
    public $drops, $price, $message, $dropInfo = "";

    public function openFunction()
    {
        $user = User::find(auth()->user()->id); //Pull user details from DB

        if($user->money >= $this->price) { //If user have enought money to open case 
            $pull = 0;
        
            foreach($this->drops as $drop) {
                $pull += $drop['chances'];
                $winpull[] = [
                    'pull' => $pull, 
                    'id' => $drop['item']['id'], 
                    'price' => $drop['item']['price'], 
                    'name' => $drop['item']['name']
                ];
            }
            $win = rand(1,100);
            foreach($winpull as $item) {
                if($item['pull'] > $win) {
                        $float = mt_rand(1, 50) / 10;
                        $price = ($item['price'] * $float) / 2;
                        $add_item = [   // Create array to insert to DB
                            'id' => $item["id"], 
                            'float' => $float, 
                            'price' => $price
                        ];
                        $newItem[] = $add_item;
                        $player_items = json_decode($user->items);
                        $player_items[] = $newItem;
                        $user->items = json_encode($player_items); // Encode items array to insert data to DB
                        $user->money -= $this->price;
                    $user->save();
                    $this->dropInfo = "You got {$item['name']} for {$price}$";
                    break;
                }
            }
        } else { // If user dont have enought money show error
            $this->message = "You dont't have enought money to open this case";
        }
    }

    public function render()
    {
        return view('livewire.case.open');
    }
}
