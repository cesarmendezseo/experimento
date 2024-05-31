<?php

namespace App\Livewire;

use App\Models\PlantillaEquipo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Estadistica extends Component
{
    public $torneoId = 1;



    public function render()
    {

        $jugadores = PlantillaEquipo::where('activo', 'true')
            ->where('torneo_id', $this->torneoId)
            ->join('jugadors', 'plantilla_equipos.jugador_id', '=', 'jugadors.id')
            ->join('equipos', 'plantilla_equipos.equipo_id', '=', 'equipos.id')
            ->join('torneos', 'plantilla_equipos.torneo_id', '=', 'torneos.id')
            ->select('jugadors.*', 'equipos.nombre as nombre_equipo', 'torneos.nombre as nombre_torneo')
            ->orderBy('jugadors.apellido')
            ->get();


        return view('livewire.estadistica', compact('jugadores'));
    }
}
