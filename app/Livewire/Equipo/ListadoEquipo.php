<?php

namespace App\Livewire\Equipo;

use Livewire\Component;
use App\Models\Equipo;

class ListadoEquipo extends Component
{

    public $equipos, $nombre, $id;
    public $isOpen = 0;

    public function render()
    {
        $this->equipos = Equipo::all();
        return view('livewire.equipo.equipo');
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
        $this->nombre = '';
    }


    public function store()
    {

        $this->validate([
            'nombre' => 'required|unique:equipos,nombre,' . $this->id,
        ]);

        $equipos = Equipo::where('nombre', $this->nombre)->first();

        if ($equipos) {
            $equipos->update([

                'nombre' => strtolower($this->nombre),

            ]);
            session()->flash('mesagge', 'El equipo fue modificado correctamente!!');
            session()->flash('mesagge_type', 'success');
            $this->closeModal();
        } else {
            Equipo::create([

                'nombre' => strtolower($this->nombre),
            ]);
            session()->flash('mesagge', 'El equipo fue creado correctamente!!');
            session()->flash('mesagge_type', 'success');
            $this->closeModal();
        }
    }

    public function edit($id)
    {
        $equipos = Equipo::findOrFail($id);

        $this->id = $equipos->id;
        $this->nombre = $equipos->nombre;
        $this->openModal();
    }

    public function delete($id)
    {
        $equipos = Equipo::find($id);
        $nombre = ucwords($equipos->nombre);


        $equipos->delete();

        session()->flash('mesagge', 'El equipo ' . '"' . $nombre . '"' . ' se elimno correctamente');
        session()->flash('mesagge_type', 'danger');
    }
}
