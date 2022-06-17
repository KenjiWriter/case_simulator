<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class playerController extends Controller
{
    public function Inventory()
    {
        return view('user.inventory');
    }
}
