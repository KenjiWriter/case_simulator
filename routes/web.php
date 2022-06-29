<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\caseController;
use App\Http\Controllers\playerController;
use App\Http\Controllers\upgraderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/case/{id}', [caseController::class, 'showCase'])->name('showcase');
Route::get('/', [caseController::class, 'Index'])->name('index');
Route::get('/inventory', [playerController::class, 'Inventory'])->name('inventory')->middleware('auth');
Route::get('/upgrader', [upgraderController::class, 'index'])->name('upgrader')->middleware('auth');
