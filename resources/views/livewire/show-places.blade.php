<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" wire:poll.5s>
                <div class="container px-6 mx-auto grid">
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4" >
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
                            <div class="h-20 bg-red-400 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5 text-center">B2 - A104 . Ingeniería</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5">{{ $B2A104 }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-blue-700 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">B3 - A101 . Eco - Admin</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5"> {{ $B3A101 }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-purple-900 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">B3 - A203 . Edu - Cien</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5">{{ $B3A203 }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-blue-500 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">B4 - A102 . Salud</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5">{{ $B4A102 }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-purple-400 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">B4 - A201 . AGRO</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5">{{ $B4A201 }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-blue-400 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">FUERA DE CENSO</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL Aprox.</p>
                            </div>
                            <p class="py-4 text-3xl ml-5">{{ $OutCounter }}</p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-yellow-600 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">VOTOS LIDERES</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL</p>
                            </div>
                            <p class="py-4 text-3xl ml-5"> {{ $TotalVotoLider }} </p>
                            <!-- <hr > -->
                        </div>
                        <div class="mt-10 w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                            <div class="h-20 bg-green-600 flex items-center justify-between">
                                <p class="mr-0 text-white text-lg pl-5">VOTOS DIPLOMADO</p>
                            </div>
                            <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                                <p>TOTAL</p>
                            </div>
                            <p class="py-4 text-3xl ml-5"> {{ $TotalVotoDiplomado }} </p>
                            <!-- <hr > -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



