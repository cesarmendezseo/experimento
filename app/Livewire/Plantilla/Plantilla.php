<?php

namespace App\Livewire\Plantilla;

use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\PlantillaEquipo;
use App\Models\Torneo;
use Livewire\Component;


class Plantilla extends Component

{

    public $tablaEquipos, $tablaJugadores, $tablaTorneos, $tablaPlantilla;
    public  $isOpen = false;
    public $isActive, $search = '';
    public $mensajeError;
    public $dni, $nombre, $apellido, $nombreTorneo, $nombreEquipo;
    public $jugadorBuscado, $buscaDni;
    public $jugadorId, $registroExiste, $registro, $torneoId, $equipoId;
    public $torneo, $equipo, $partes;
    public $mensaje, $contador, $boton, $activo, $mensajeEquipo, $mostrarEquipo;
    public $usuarios;




    public function guardarPlantilla()
    {
        // Validar los datos
        $this->validate([
            'jugadorId' => 'required|exists:jugadors,id',
            'torneo' => 'required|exists:torneos,id',
            'equipo' => 'required|exists:equipos,id',
        ]);

        $registroExiste = PlantillaEquipo::where('jugador_id', $this->jugadorId)->get();

        $this->contador = 0;

        //consultamos si el jugador esta en la plantilla, y si esta consultamos si esta activo para no volver agregar.
        if (!$registroExiste->isEmpty()) {
            foreach ($registroExiste as $registro) {
                if ($registro->activo === "true") {
                    $this->contador++;;
                    $this->mostrarEquipo = $registro->equipo->nombre;
                }
            }
            //si el contador es mayor a 0, quiere decir que hay un jugador en la planilla y esta activo. de lo contrario lo creamos. 
            if ($this->contador > 0) {
                $this->mensajeError = "El jugador ya esta registrado con el equipo " . $this->mostrarEquipo;
            } else {
                $this->isActive = "true";
                $this->crearPLantilla();
            }
        } else {
            $this->isActive = "true";
            $this->crearPLantilla();
        }
    }



    public function render()
    {


        $partes = explode(' ', $this->search, 2); // divide la entrada en dos partes
        $this->tablaEquipos = Equipo::all();
        $this->tablaJugadores = Jugador::all();
        $this->tablaTorneos = Torneo::all();
        //$this->tablaPlantilla = PlantillaEquipo::all();
        $this->tablaPlantilla = PlantillaEquipo::whereHas('jugador', function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('apellido', 'like', '%' . $this->search . '%')
                ->orWhere('dni', 'like', '%' . $this->search . '%');
        })->get();
        return view('livewire.plantilla.plantilla');
    }


    public function buscar()
    {
    }

    /*  */

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    /*  */

    public function openModal()
    {
        $this->isOpen = true;
    }
    /*  */
    public function closeModal()
    {
        $this->resetInputFields();
        $this->isOpen = false;
    }
    /*  */
    private function resetInputFields()
    {

        $this->nombre = '';
        $this->apellido = "";
        $this->dni = "";
        $this->isActive = '';
        $this->buscaDni = '';
        $this->mensajeError = '';
    }


    /* Buscamos el jugador si esta creado en la BD.  */

    public function buscarJugador()
    {

        $jugadorBuscado = Jugador::where('dni', $this->buscaDni)->first();

        if ($jugadorBuscado) {
            $this->jugadorId = $jugadorBuscado->id;
            $this->dni = $jugadorBuscado->dni;
            $this->nombre = $jugadorBuscado->nombre;
            $this->apellido = $jugadorBuscado->apellido;
            $this->mensajeError = "";
        } else {
            $this->mensajeError = "Jugador no encontrado";
            $this->resetInputFields();
        }
    }




    public function crearPLantilla()
    {
        $plantilla = new PlantillaEquipo();
        $plantilla->jugador_id = $this->jugadorId;
        $plantilla->torneo_id = $this->torneo;
        $plantilla->equipo_id = $this->equipo;
        $plantilla->activo = $this->isActive; // Convert boolean to string
        $plantilla->save();
        $this->mensajeError = "El jugador se a creado";
        $this->resetInputFields();
        $this->closeModal();
    }



    public function bajaJugador($id)
    {
        // Encuentra el registro por ID y actualiza el campo 'activo' a false
        $registro = PlantillaEquipo::find($id);

        if ($registro) {
            $registro->activo = "false";
            $registro->save();
        }




        // Puedes agregar lógica adicional aquí, como mostrar un mensaje de confirmación
    }
}
