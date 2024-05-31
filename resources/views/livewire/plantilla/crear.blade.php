<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400  ">
    <div class="flex items-end justify-center max-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>


        {{-- contenedor --}}
        <div class="inline-block align-bottom bg-slate-100 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            {{-- BUSCAMOS POR DNI  --}}
            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Buscar jugador
                    por DNI</label>
                <input type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    wire:model="buscaDni"></input>
                <button wire:click="buscarJugador()"
                    class="bg-blue-500 mt-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar
                </button>


                @error('dni')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <span class="m-5">{{ $mensajeError }}</span>


            </div>


            <hr class="border-b border-gray-300 my-4">

            {{-- SI ENCUENTRA EL JUGADOR SE MUESTRA EL FORMULARIO --}}

            <div class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <form wire:submit.prevent="guardarPlantilla">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">

                        <div>
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dni</label>
                            <input readonly type="text" wire:model="dni"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input readonly type="text" wire:model="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div>
                            <label for="company"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                            <input readonly type="text" wire:model="apellido"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="px-6 py-4">
                            <select wire:model.live="equipo">
                                <option value="">Elige un equipo</option>
                                @foreach ($tablaEquipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('equipo')
                                <span>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <td class="px-6 py-4">
                            <select wire:model="torneo">
                                <option value="">Elige un torneo</option>
                                @foreach ($tablaTorneos as $torneo)
                                    <option value="{{ $torneo->id }}">{{ $torneo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('torneo')
                                <span>
                                    {{ $message }}
                                </span>
                            @enderror
                        </td>
                    </div>
                    <button type ="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

                    <button type ="button" wire:click="closeModal()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
