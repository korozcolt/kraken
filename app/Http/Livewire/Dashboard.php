<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Coordinator;
use App\Models\Lider;
use App\Models\Voter;
use Livewire\Component;
use Carbon\Carbon;


class Dashboard extends Component
{
    public function render()
    {
        $censoTotal = Censo::all()->count();
        $coordinatorTotal = Coordinator::all()->count();
        $liderTotal = Lider::all()->count();
        $voterTotal = Voter::all()->count();
        $voterPerDay = Voter::whereDate('created_at',Carbon::now())->count();
        $liderPerDay = Lider::whereDate('created_at',Carbon::now())->count();
        return view('livewire.dashboard',compact('censoTotal','coordinatorTotal','liderTotal','voterTotal','voterPerDay','liderPerDay'));
    }
}
