<?php

namespace App\Http\Livewire;

use App\Models\Censo;
use App\Models\Voter;
use App\Models\Lider;
use Livewire\Component;

class CreateVoter extends Component
{
    public $open = false;
    public $name, $last, $dni, $phone, $phone2, $lider_id;

    public function updatedDni(){
        $voter = Censo::where('dni','LIKE','%'.$this->dni.'%')->first();
        if(!empty($voter)){
            $this->name = $voter->name;
            $this->last = $voter->last;
        }else{
            $this->name = "";
            $this->last = "";
        }
    }

    public function render(){
        $liders = Lider::orderBy('name')->get();
        return view('livewire.create-voter',compact('liders'));
    }

    public function save(){
        $lider = Voter::where('dni',$this->dni)->first();
        $this->validate([
            'name' => 'required|max:50',
            'last' => 'required|max:50',
            'dni' => 'numeric|required|unique:voters,dni',
            'phone' => 'required',
            'lider_id' => 'required'
        ],[
            'name.required' => 'Nombre requerido',
            'last.required' => 'Apellido requerido',
            'dni.unique' => 'Este número ya se encuentra en uso por '. $lider->lider->name . ' '. $lider->lider->last,
            'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
            'dni.required' => 'La cedula es campo obligatorio',
            'phone.required' => 'Teléfono requerido',
            'lider_id.required' => 'Lider requerido',
        ]);
        Voter::create([
            'name' => $this->name,
            'last' => $this->last,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'lider_id' => $this->lider_id,
            'user_id' => \Auth::id(),
            'status' => 1
        ]);
        $url = "https://api103.hablame.co/";
        $this->reset([
            'open','name','last','dni','phone','phone2'
        ]);
        $this->emitTo('voter-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Coordinador');
    }
}
