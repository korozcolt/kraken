<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CoordinatorLivewire;
use App\Http\Livewire\VoterLivewire;
use App\Http\Livewire\LiderLivewire;
use App\Http\Livewire\CensoLivewire;
use App\Http\Livewire\UserCount;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/users-count', UserCount::class)->name('users-count');
Route::middleware(['auth:sanctum', 'verified'])->get('/lider/{id}', function($id){
    $voters = \App\Models\Voter::where('lider_id',$id)->orderBy('name','asc')->get();
    $lider = \App\Models\Lider::find($id);
    return view('lists',compact('voters','lider'));
})->name('lider.list');
