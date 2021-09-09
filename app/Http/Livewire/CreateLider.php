<?php

namespace App\Http\Livewire;

use App\Models\Coordinator;
use App\Models\Lider;
use Livewire\Component;

class CreateLider extends Component
{
    public $open = false;
    public $name, $last, $dni, $phone, $phone2, $coordinator_id;

    protected $rules = [
        'name' => 'required|max:50',
        'last' => 'required|max:50',
        'dni' => 'numeric|required|unique:liders,dni',
        'phone' => 'required',
        'coordinator_id' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Nombre requerido',
        'last.required' => 'Apellido requerido',
        'dni.unique' => 'Este número ya se encuentra en uso',
        'dni.numeric' => 'La cedula debe ser un numero sin letras o caracteres',
        'dni.required' => 'La cedula es campo obligatorio',
        'phone.required' => 'Teléfono requerido',
        'coordinator_id.required' => 'Coordinador requerido',
    ];

    public function render(){
        $coordinators = Coordinator::all();
        return view('livewire.create-lider',compact('coordinators'));
    }

    public function save(){
        $this->validate();
        Lider::create([
            'name' => $this->name,
            'last' => $this->last,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'coordinator_id' => $this->coordinator_id,
            'user_id' => \Auth::id(),
            'status' => 1
        ]);
        $this->reset([
            'open','name','last','phone','phone2'
        ]);
        $this->emitTo('lider-livewire','render');
        $this->emit('alert','Se ha creado un Registro de Coordinador');
    }
}
