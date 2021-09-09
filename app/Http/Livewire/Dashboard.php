<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use Livewire\Component;


class Dashboard extends Component
{
    public function render()
    {
        $censoTotal = Censo::all()->count();
        $coordinatorTotal = Coordinator::all()->count();
        $liderTotal = Lider::all()->count();
        $voterTotal = Voter::all()->count();
        return view('livewire.dashboard',compact('censoTotal','coordinatorTotal','liderTotal','voterTotal'));
    }
}
