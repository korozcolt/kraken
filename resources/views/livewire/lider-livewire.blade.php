<div wire:init="loadLider">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lider') }}
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
                        <x-jet-input type="text" wire:model="search" class="mr-4 ml-4" placeholder="Buscar..."/>
                        @livewire('create-lider')
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            @if(!$readyToLoad)
                                <div class="fa-3x text-center">
                                    <i class="fas fa-stroopwafel fa-spin"></i>
                                </div>
                            @endif
                            @if( count($liders) && (auth()->user()->role == 5 || auth()->user()->role == 6 || auth()->user()->role == 2 || auth()->user()->role == 9))
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
                                            Tel??fono
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
                                        <th class="px-4 py-3 cursor-pointer text-gray-500" wire:click="order('coordinator_id')">
                                            Coordinador
                                            @if($sort == 'coordinator_id')
                                                @if($direction == 'asc')
                                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-gray-300"></i>
                                                @else
                                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-gray-300"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort float-right mt-1 text-gray-300"></i>
                                            @endif
                                        </th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500">Votantes</th>
                                        <th class="px-4 py-3 text-gray-500">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach($liders as $value)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold underline hover:underline"><a target="_blank" href="{{ route('lider.list',$value->id) }}">{{ $value->name}} {{ $value->last}}</a></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni}}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->phone }}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->coordinator->name }} {{ $value->coordinator->last }}</td>
                                            <td class="px-4 py-3 text-xs border text-center">
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center">{{ $value->voters->count() }}</span>
                                            </td>
                                            <td class="px-4 py-3 text-xs border text-center flex">
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="edit({{$value}})">
                                                    <i class="material-icons-outlined text-base"> edit </i>
                                                </a>
                                                <a href="#" class="text-gray-400 hover:text-gray-100 ml-2" wire:click="$emit('deleteLider',{{ $value->id }})">
                                                    <i class="material-icons-round text-base">delete_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($liders->hasPages())
                                    <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                        {{ $liders->links() }}
                                    </div>
                                @endif
                            @else
                                <div class="px-6 py-4">No existe ning??n registro.</div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Edita un registro de Lider {{ $lider->name }} {{ $lider->last }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="lider.name"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="lider.last"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula" class="text-left"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="lider.dni"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Tel??fono" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="lider.phone"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Tel??fono (opcional)" class="text-left"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="lider.phone2"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Coordinador" class="text-left"></x-jet-label>
                <select wire:model="lider.coordinator_id" class="w-full mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach( $coordinators as $item )
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
</div>


