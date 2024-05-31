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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="relative overflow-x-auto bg-slate-900 shadow-md sm:rounded-lg">
                    <button wire:click="create()"
                        class="bg-blue-500 -2 m-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear
                        Nuevo Jugador
                    </button>


                    @if ($isOpen)
                        @include('livewire.jugadores.Crear')
                    @endif




                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
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
                                    Nacimiento
                                </th>
                                <th class="px-6 py-3">
                                    Domicilio
                                </th>
                                <th class="px-6 py-3">
                                    Accion
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jugadores as $jugador)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $jugador->dni }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ ucwords($jugador->nombre) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ucwords($jugador->apellido) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $jugador->nacimiento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ucfirst($jugador->domicilio) }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        <button wire:click= "edit({{ $jugador->id }})"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                                        </button>
                                        <button type="button" wire:click= "deleteJugador({{ $jugador->id }})"
                                            wire:confirm="Estas seguro de querer eliminar el jugador?"
                                            data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="formulario-eliminar bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
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
