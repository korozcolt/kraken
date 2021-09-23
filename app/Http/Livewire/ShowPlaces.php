<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use DB;
use Illuminate\Support\Collection;

class ShowPlaces extends Component
{
    public function render()
    {
        $B3A203 = DB::table('voters as v')
                                     ->join('censos as c','v.dni','=','c.dni')
                                     ->where('v.status','=',9)
                                     ->where(function ($query){
                                         return $query->where('c.program','like','%EDU%')
                                                      ->orWhere('c.program','like','%LIC%')
                                                      ->orWhere('c.program','like','%CIEN%');
                                     })->count();
        return view('livewire.show-places',compact('B3A203'));
    }
}
