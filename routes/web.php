<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CoordinatorLivewire;
use App\Http\Livewire\VoterLivewire;
use App\Http\Livewire\LiderLivewire;
use App\Http\Livewire\CensoLivewire;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/coordinators', CoordinatorLivewire::class)->name('coordinator');
Route::middleware(['auth:sanctum', 'verified'])->get('/liders', LiderLivewire::class)->name('lider');
Route::middleware(['auth:sanctum', 'verified'])->get('/voters', VoterLivewire::class)->name('voter');
Route::middleware(['auth:sanctum', 'verified'])->get('/censo', CensoLivewire::class)->name('censo');
