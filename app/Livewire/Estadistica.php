<?php

namespace App\Livewire;

use App\Models\Equipo;
use App\Models\PlantillaEquipo;
use App\Models\Torneo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Estadistica extends Component
{
    public $torneoId;
    public $jugadores;
    public $torneos, $id;
    public $nombreTorneo = "";
    public $torneoSeleccionado;
    public $equipoSeleccionado, $equipos;


    public function mount()
    {
        $this->torneos = Torneo::all();
        $this->equipos = Equipo::all();
    }

    public function render()
    {
        $this->jugadores = PlantillaEquipo::where('activo', 'true')
            ->where('torneo_id', $this->torneoSeleccionado)
            ->where('equipo_id', $this->equipoSeleccionado)
            ->join('jugadors', 'plantilla_equipos.jugador_id', '=', 'jugadors.id')
            ->join('equipos', 'plantilla_equipos.equipo_id', '=', 'equipos.id')
            ->join('torneos', 'plantilla_equipos.torneo_id', '=', 'torneos.id')
            ->select('jugadors.*', 'equipos.nombre as nombre_equipo', 'torneos.nombre as nombre_torneo')
            ->orderBy('jugadors.apellido')
            ->get();



        return view('livewire.estadistica', ['torneos' => $this->torneos]);
    }


    public function updateSelecTorneo($torneoSeleccionado)
    {
        $this->torneoSeleccionado = $torneoSeleccionado;
    }
}
