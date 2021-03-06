<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CoordinatorLivewire;
use App\Http\Livewire\VoterLivewire;
use App\Http\Livewire\LiderLivewire;
use App\Http\Livewire\CensoLivewire;
use App\Http\Livewire\UserCount;
use App\Http\Livewire\ShowPlaces;
use App\Models\User;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    //Route::get('/', 'HomeController@index')->name('home.index');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Routes Dashboard
         */
        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');
    });
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/coordinators', CoordinatorLivewire::class)->name('coordinator');
Route::middleware(['auth:sanctum', 'verified'])->get('/liders', LiderLivewire::class)->name('lider');
Route::middleware(['auth:sanctum', 'verified'])->get('/voters', VoterLivewire::class)->name('voter');
Route::middleware(['auth:sanctum', 'verified'])->get('/censo', CensoLivewire::class)->name('censo');
Route::middleware(['auth:sanctum', 'verified'])->get('/users-count', UserCount::class)->name('users-count');
Route::middleware(['auth:sanctum', 'verified'])->get('/places', ShowPlaces::class)->name('place');

//------------------------------- LISTAS ---------------------------------------
Route::middleware(['auth:sanctum', 'verified'])->get('/lider/{id}', function($id){
    $voters = \App\Models\Voter::where('lider_id',$id)->orderBy('name','asc')->get();
    $lider = \App\Models\Lider::find($id);
    return view('lists',compact('voters','lider'));
})->name('lider.list');

Route::middleware(['auth:sanctum', 'verified'])->get('/liders/lider', function(){
    $lider = \App\Models\Lider::with(['voters' => function($query){
        return $query->where('find',4);
    }])->where('status',2)->get();
    return view('lists-liders-two',compact('lider'));
})->name('lider.votaciones.yahir');

Route::middleware(['auth:sanctum', 'verified'])->get('/liders/diplomado', function(){
    $lider = \App\Models\Lider::with(['voters' => function($query){
        return $query->where('find',4);
    }])->where('status',1)->get();
    return view('lists-liders-one',compact('lider'));
})->name('lider.votaciones.diplomado');

Route::middleware(['auth:sanctum', 'verified'])->get('/status/{status}', function($status){
    $voters = \App\Models\Voter::with(['lider' => function($q){ return $q->orderBy('liders.name','asc');}])->where('status',$status)->get();
    $name_status = "";
    if($status == 0){
        $name_status = "LLAMADO - CUELGA - NO DA RESPUESTA";
    }else if($status == 1){
        $name_status = "INGRESADO - NO LLAMADO";
    }else if($status == 2){
        $name_status = "LLAMADO - NO CONTESTA";
    }else if($status == 3){
        $name_status = "LLAMADO - N??MERO EQUIVOCADO";
    }else if($status == 4){
        $name_status = "LLAMADO - MAL ESCRITO O APAGADO";
    }else if($status == 5){
        $name_status = "LLAMADO - FUERA DEL RANGO";
    }else if($status == 6){
        $name_status = "LLAMADO - NO SABE NO RESPONDE";
    }else if($status == 7){
        $name_status = "LLAMADO - VOTA EN CONTRA";
    }else if($status == 8){
        $name_status = "LLAMADO - VOTA EN BLANCO";
    }else if($status == 9){
        $name_status = "LLAMADO - VOTA A FAVOR";
    }


    return view('lists-by-option',compact('voters','name_status'));
})->name('status.list');
