<div>
    {{-- In work, do what you enjoy. --}}

    {{--  <div class="max-w-sm mx-auto">
        <label for="underline_select" class="sr-only">Underline select</label>
        <select id="underline_select" wire:model.change="torneoSeleccionado"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Elige un torneo</option>
            @foreach ($torneos as $torneo)
                <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
            @endforeach
        </select>
    </div> --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">

                <tr>

                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        Jugador
                    </th>
                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        <select id="underline_select" wire:model.change="equipoSeleccionado"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>EQUIPO</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        <select id="underline_select" wire:model.change="torneoSeleccionado"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>TORNEO</option>
                            @foreach ($torneos as $torneo)
                                <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
                            @endforeach
                        </select>
                    </th>

                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        Gol
                    </th>
                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        Amarilla
                    </th>
                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        Doble Amarilla
                    </th>
                    <th scope="col" class="px-6 py-3" style="width:15%;">
                        Roja
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jugadores as $plantilla)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ strtoupper($plantilla->apellido . ',  ' . $plantilla->nombre) }}
                        </th>

                        <td class="px-6 py-4">
                            {{ strtoupper($plantilla->nombre_equipo) }}
                        </td>
                        {{-- <td class="px-6 py-4">
                            {{ strtoupper($plantilla->nombre_equipo) }}
                        </td> --}}
                        <td class="px-6 py-4">
                            {{ strtoupper($plantilla->nombre_torneo) }}
                        </td>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">Gol</label>
                            </div>
                        </td>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">Amarilla</label>
                            </div>
                        </td>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">doble</label>
                            </div>
                        </td>

                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">roja</label>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center">No hay datos disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
