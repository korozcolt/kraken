<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container px-6 mx-auto grid">
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs" wire:poll.10s>
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Censo
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $censoTotal }}
                                </p>
                            </div>

                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Coordinadores
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $coordinatorTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Lideres
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $liderTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Votantes
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Votantes por día
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterPerDay }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    Total Lider por día
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $liderPerDay }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    NO LLAMADOS
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterNotCalledTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    NO CONTESTA
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterNotAnswerTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    NUMERO EQUIVOCADO
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterBadWriteTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    MAL ESCRITO O APAGADO
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterWrongNumberTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    FUERA DE RANGO
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterOutRangeTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    NO SABE NO RESPONDE
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterDontKnowTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    EN CONTRA
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterVersusTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    EN BLANCO
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterWhiteTotal }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                            <div
                                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600">
                                    A FAVOR
                                </p>
                                <p class="text-lg font-semibold text-gray-700">
                                    {{ $voterRightTotal }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


