<div wire:init="loadCenso">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Censo') }}
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
                        @livewire('create-censo')
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            @if(!$readyToLoad)
                                <div class="fa-3x text-center">
                                    <i class="fas fa-stroopwafel fa-spin"></i>
                                </div>
                            @endif
                            @if( count($censos) && auth()->user()->role == 5 || auth()->user()->role == 6 || auth()->user()->role == 2)
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
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('program')">
                                            Profesión
                                            @if($sort == 'program')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300 "></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('study')">
                                            Estudio
                                            @if($sort == 'study')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 text-gray-500">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach($censos as $value)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold text-black">{{ $value->name}} {{ $value->last}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni}}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->program }}</td>
                                            <td class="px-4 py-3 text-xs border text-center">
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> {{ $value->study }} </span>
                                            </td>
                                            <td class="px-4 py-3 text-xs border text-center flex">
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="edit({{$value}})">
                                                    <i class="material-icons-outlined text-base">edit</i>
                                                </a>
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="$emit('deleteCenso',{{ $value->id }})">
                                                    <i class="material-icons-round text-base">delete_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($censos->hasPages())
                                    <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                        {{ $censos->links() }}
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
            Edita un registro del censo {{ $censo->name }} {{ $censo->last }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="censo.name"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="censo.last"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="censo.dni"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Estudio" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="censo.study"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Program" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="censo.program"></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">Actualizar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


