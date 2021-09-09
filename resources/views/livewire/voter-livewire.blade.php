<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <section class="container mx-auto p-6">
                    <div class="px-8 py-4">
                        <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar..."/>
                    </div>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3 text-center">Nombre</th>
                                    <th class="px-4 py-3 text-center">Cedula</th>
                                    <th class="px-4 py-3 text-center">Celular</th>
                                    <th class="px-4 py-3 text-center">Estado</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($censos as $censo)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 border">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold text-black">{{ $censo->name}} {{ $censo->last}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-ms font-semibold border">{{ $censo->dni}}</td>
                                        <td class="px-4 py-3 text-sm border">3016859339</td>
                                        <td class="px-4 py-3 text-xs border text-center">
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> Acceptable </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="py-1 mt-2 mb-2 mr-4 ml-4">{{ $censos->links() }}</div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


