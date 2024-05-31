<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function jugadores()
    {
        return $this->belongsToMany(Jugador::class, 'plantilla_equipo');
    }

    public function torneos()
    {
        return $this->belongsToMany(Torneo::class, 'plantilla_equipo');
    }
}
