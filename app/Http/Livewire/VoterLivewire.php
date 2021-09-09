<?php

namespace App\Http\Livewire;

use App\Models\Voter;
use App\Models\Censo;
use Livewire\Component;

class VoterLivewire extends Component
{
    public $search;

    public function render()
    {
        $voters = Voter::where('name','like','%' . $this->search . '%')
                        ->orWhere('last','like','%' . $this->search . '%')->get();
        $censos = Censo::paginate(15);
        return view('livewire.voter-livewire',compact('voters','censos'));
    }
}
