<?php

namespace App\Livewire\Jugadores;

use App\Models\Jugador;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Jugadores extends Component
{

    public $dni, $nombre, $apellido, $nacimiento, $domicilio;
    public $jugadores, $id, $exist;
    public $isOpen = 0;



    public function render()
    {
        $this->jugadores = Jugador::all();
        return view('livewire.jugadores.jugadores');
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->dni = '';
        $this->nombre = '';
        $this->apellido = '';
        $this->nacimiento = '';
        $this->domicilio = '';
    }

    public function store()
    {

        $this->validate([
            'dni' => 'required|unique:jugadors,dni,' . $this->id,
            'nombre' => 'required',
            'apellido' => 'required',

        ]);

        $jugador = Jugador::where('dni', $this->dni)->first();


        if ($jugador) {
            $jugador->update([

                'nombre' => strtolower($this->nombre),
                'apellido' => strtolower($this->apellido),
                //esto hace que si no cargo nada en la fecha de nacimiento sea nulo y no de error. 
                'nacimiento' => $this->nacimiento ? strtolower($this->nacimiento) : null,
                'domicilio' => strtolower($this->domicilio)
            ]);
            session()->flash('mesagge', 'El jugador fue modificado correctamente!!');
            session()->flash('mesagge_type', 'success');
            $this->closeModal();
        } else {
            Jugador::create([
                'dni' => $this->dni,
                'nombre' => strtolower($this->nombre),
                'apellido' => strtolower($this->apellido),
                'nacimiento' => $this->nacimiento ? strtolower($this->nacimiento) : null,
                'domicilio' => strtolower($this->domicilio)

            ]);
            session()->flash('mesagge', 'El jugador fue creado correctamente!!');
            session()->flash('mesagge_type', 'success');
            $this->closeModal();
        }
    }



    public function edit($id)
    {
        $jugadores = Jugador::findOrFail($id);

        $this->id = $jugadores->id;
        $this->dni = $jugadores->dni;
        $this->nombre = $jugadores->nombre;
        $this->apellido = $jugadores->apellido;
        $this->nacimiento = $jugadores->nacimiento;

        $this->openModal();
    }


    public function deleteJugador($id)
    {
        $jugadores = Jugador::find($id);
        $nombre = ucwords($jugadores->nombre);
        $apellido = ucwords($jugadores->apellido);

        $jugadores->delete();

        session()->flash('mesagge', 'El jugador ' . '"' . $nombre . ' ' . $apellido . '"' . ' se elimno correctamente');
        session()->flash('mesagge_type', 'danger');
    }
}
