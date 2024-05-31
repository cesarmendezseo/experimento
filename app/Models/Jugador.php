<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $fillable = ['dni', 'nombre', 'apellido', 'nacimiento', 'domicilio'];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'plantilla_equipo');
    }
}
