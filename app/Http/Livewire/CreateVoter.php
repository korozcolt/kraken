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

    protected $rules = [
        'name' => 'required|max:50',
        'last' => 'required|max:50',
        'dni' => 'numeric|required|unique:voters,dni',
        'phone' => 'required',
        'lider_id' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Teléfono requerido',
        'lider_id.required' => 'Lider requerido',
    ];

    public function updated(){
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
        $liders = Lider::all();
        return view('livewire.create-voter',compact('liders'));
    }

    public function save(){
        $this->validate();
        Lider::create([
            'name' => $this->name,
            'last' => $this->last,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'lider_id' => $this->lider_id,
            'user_id' => \Auth::id(),
            'status' => 1
        ]);
        $this->reset([
            'open','name','last','phone','phone2'
        ]);
        $this->emitTo('voter-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Coordinador');
    }
}
