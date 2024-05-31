<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jugadores') }}
        </h2>

    </x-slot>
    {{-- mensajes --}}
    @if (session()->has('mesagge'))
        <div class="{{ session('mesagge_type') === 'success' ? ' bg-green-600 text-green-100 text-center text-lg font-bold p-2' : 'bg-red-700 text-red-100 text-center text-lg font-bold p-2' }} border px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session('mesagge') }}</span>

            @if (session('mesagge_type') === 'success')
                <i class="far fa-check-circle "></i>
            @else
                <i class="fas fa-exclamation-circle mr-2"></i>
            @endif

        </div>
    @endif

    <div class="relative overflow-x-auto bg-slate-900 shadow-md sm:rounded-lg">
        <button wire:click="create()"
            class="bg-blue-500 -2 m-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Agregar Jugador
        </button>


        @if ($isOpen)
            @include('livewire.plantilla.Crear')
        @endif


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="relative overflow-x-auto bg-slate-900 shadow-md sm:rounded-lg">
                        <form class="max-w-md mx-auto">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search" wire:model.live="search"
                                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="buscar por nombre, apellido o dni..." required />
                                {{-- <button type="submit" wire:click="search"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                             --}}
                            </div>
                        </form>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="">
                                    <th class="px-6 py-3">
                                        Dni
                                    </th>
                                    <th class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th class="px-6 py-3">
                                        Apellido
                                    </th>
                                    <th class="px-6 py-3">
                                        Equipo
                                    </th>
                                    <th class="px-6 py-3">
                                        edito
                                    </th>
                                    <th class="px-6 py-3">
                                        Creado
                                    </th>
                                    <th class="px-6 py-3">
                                        Actualizado
                                    </th>
                                    <th class="px-6 py-3">
                                        estado
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tablaPlantilla as $plantilla)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $plantilla->jugador ? ucwords($plantilla->jugador->dni) : 'N/A' }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $plantilla->jugador ? ucwords($plantilla->jugador->nombre) : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $plantilla->jugador ? ucwords($plantilla->jugador->apellido) : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $plantilla->equipo ? ucwords($plantilla->equipo->nombre) : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $plantilla->torneo ? ucwords($plantilla->torneo->nombre) : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucwords($plantilla->created_at->format('d-m-Y')) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucwords($plantilla->updated_at->format('d-m-Y')) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($plantilla->activo === 'false')
                                                Baja
                                            @else
                                                Alta
                                            @endif
                                        </td>


                                        <td class="border px-4 py-2">
                                            <button wire:click="bajaJugador({{ $plantilla->id }})"
                                                @if ($plantilla->activo === 'false') disabled 
                                                class="text-gray-500 bg-gray-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                @else
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-9000" @endif
                                                Baja </button>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  <td class="px-6 py-4">
                                            <select wire:model="equipoId">
                                                <option value="">Elige un equipo</option>
                                                @foreach ($equipos as $equipo)
                                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="px-6 py-4">
                                            <select wire:model="torneoId">
                                                <option value="">Torneo</option>
                                                @foreach ($torneos as $torneo)
                                                    <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
