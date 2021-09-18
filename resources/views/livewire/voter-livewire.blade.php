<div wire:init="loadVoter">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="container mx-auto p-6">
                    <div class="px-8 py-4 items-center">
                        <div class="items-center">
                            <span>Mostrar</span>
                            <select wire:model="cant" class="mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span> entradas</span>
                        </div>
                        <x-jet-input type="text" wire:model="search" class=" mr-4 ml-4" placeholder="Buscar..."/>
                        @livewire('create-voter')
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            @if(!$readyToLoad)
                                <div class="fa-3x text-center">
                                    <i class="fas fa-stroopwafel fa-spin"></i>
                                </div>
                            @endif
                            @if( count($voters) && (auth()->user()->role == 5 || auth()->user()->role == 6) )
                                <table class="w-full">
                                    <thead>
                                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('name')">
                                            Nombre
                                            @if($sort == 'name')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('dni')">
                                            Cedula
                                            @if($sort == 'dni')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('phone')">
                                            Teléfono
                                            @if($sort == 'phone')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300 "></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('lider_id')">
                                            Lider
                                            @if($sort == 'lider_id')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                            @endif
                                        </th>
                                        @if(auth()->user()->role == 6)
                                            <th class="px-4 py-3 cursor-pointer text-gray-500">
                                                VOTO
                                            </th>
                                        @endif
                                        <th class="px-4 py-3 text-gray-500">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach($voters as $value)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold text-black">{{ $value->name}} {{ $value->last}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni}}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->phone }}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->lider->name }} {{ $value->lider->last }}</td>
                                            @if(auth()->user()->role == 6)
                                            <td class="px-4 py-3 text-xs border text-center">
                                                @if($value->status == 1)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> INGRESADO - NO LLAMADO </span>
                                                @elseif ($value->status == 2)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> LLAMADO - NO CONTESTA </span>
                                                @elseif ($value->status == 3)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> LLAMADO - NÚMERO EQUIVOCADO </span>
                                                @elseif ($value->status == 4)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> LLAMADO - MAL ESCRITO O APAGADO </span>
                                                @elseif ($value->status == 5)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> LLAMADO - FUERA DEL RANGO </span>
                                                @elseif ($value->status == 6)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-600 bg-yellow-100 rounded-sm text-center"> LLAMADO - NO SABE NO RESPONDE </span>
                                                @elseif ($value->status == 7)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm text-center"> LLAMADO - VOTA EN CONTRA </span>
                                                @elseif ($value->status == 8)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm text-center"> LLAMADO - VOTA EN BLANCO </span>
                                                @elseif ($value->status == 9)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> LLAMADO - VOTA A FAVOR </span>
                                                @elseif ($value->status == 0)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-red-600 bg-red-100 rounded-sm text-center"> LLAMADO - CUELGA - NO DA RESPUESTA </span>
                                                @endif
                                            </td>
                                            @endif
                                            <td class="px-4 py-3 text-xs border text-center flex">
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="edit({{$value}})">
                                                    <i class="material-icons-outlined text-base">edit</i>
                                                </a>
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="$emit('deleteVoter',{{ $value->id }})">
                                                    <i class="material-icons-round text-base">delete_outline</i>
                                                </a>
                                                @if($value->status == 1 || $value->status == 2 || $value->status == 3 || $value->status == 0 || $value->status == 6 || $value->status == 4)
                                                    <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="status_update({{ $value->id }})">
                                                        <i class="material-icons-round text-base">pending_actions</i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($voters->hasPages())
                                    <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                        {{ $voters->links() }}
                                    </div>
                                @endif
                            @else
                                <div class="px-6 py-4">No existe ningún registro.</div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Edita un registro de Lider {{ $voter->name }} {{ $voter->last }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.name"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.last"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="voter.dni"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Teléfono" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.phone"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Teléfono (opcional)" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="voter.phone2"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Lider" class="text-left"></x-jet-label>
                <select wire:model="voter.lider_id" class="w-full mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach( $liders as $item )
                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last }}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">Actualizar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="open_status">
        <x-slot name="title">
            Registro de llamada del votante {{ $voter->name }} {{ $voter->last }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Registro de llamada" class="text-left"></x-jet-label>
                <select wire:model="voter.status" class="w-full mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="1">INGRESADO - NO LLAMADO</option>
                    <option value="2">LLAMADO - NO CONTESTA</option>
                    <option value="3">LLAMADO - NÚMERO EQUIVOCADO</option>
                    <option value="4">LLAMADO - MAL ESCRITO O APAGADO</option>
                    <option value="5">LLAMADO - FUERA DEL RANGO</option>
                    <option value="6">LLAMADO - NO SABE NO RESPONDE</option>
                    <option value="0">LLAMADO - CUELGA - NO DA RESPUESTA</option>
                    <option value="7">LLAMADO - VOTA EN CONTRA</option>
                    <option value="8">LLAMADO - VOTA EN BLANCO</option>
                    <option value="9">LLAMADO - VOTA A FAVOR</option>
                </select>
            </div>
            <div class="mb-4">
                <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                <x-jet-input disabled type="text" class="w-full disabled:opacity-50" wire:model="voter.name"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                <x-jet-input disabled type="text" class="w-full disabled:opacity-50" wire:model="voter.last"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                <x-jet-input disabled type="number" class="w-full disabled:opacity-50" wire:model="voter.dni"></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_status',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="updateCall" wire:loading.attr="disabled" class="disabled:opacity-25">Actualizar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


