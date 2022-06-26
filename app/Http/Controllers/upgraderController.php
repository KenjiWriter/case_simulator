<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class upgraderController extends Controller
{
    public function index()
    {
        return view('upgrader.upgrader');
    }
}
