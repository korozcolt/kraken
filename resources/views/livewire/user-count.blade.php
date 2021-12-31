<div wire:init="loadUser">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Totales por Usuario') }}
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
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            @if(!$readyToLoad)
                                <div class="fa-3x text-center">
                                    <i class="fas fa-stroopwafel fa-spin"></i>
                                </div>
                            @endif
                            @if( count($users) && auth()->user()->role == 5 || auth()->user()->role == 6 || auth()->user()->role == 2)
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
                                        <th class="px-4 py-3 cursor-pointer text-gray-500">Cantidad por día</th>
                                        <th class="px-4 py-3 cursor-pointer text-gray-500">Cantidad Total</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach($users as $value)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    <div>
                                                        <p class="font-semibold text-black">{{ $value->name}} {{ $value->last}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{ $value->dni}}</td>
                                            <td class="px-4 py-3 text-sm border">{{ $value->voterPerDay->count() }}</td>
                                            <td class="px-4 py-3 text-xs border text-center">
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> {{ $value->voter->count() }} </span>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($users->hasPages())
                                    <div class="px-6 py-3 mt-2 mb-2 mr-4 ml-4">
                                        {{ $users->links() }}
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
</div>



