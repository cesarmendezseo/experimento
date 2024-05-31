<div>
    {{-- In work, do what you enjoy. --}}


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">

                <tr>

                    <th scope="col" class="px-6 py-3">
                        Jugador
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Equipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Torneo
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Gol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amarilla
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Doble Amarilla
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roja
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jugadores as $plantilla)
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
                @endforeach
            </tbody>
        </table>
    </div>

</div>
