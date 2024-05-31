<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantillaEquipo extends Model
{
    use HasFactory;
    protected $fillable = ['jugador_id', 'torneo_id', 'equipo_id', 'isActive'];

    public function jugador()
    {
        return $this->belongsTo(Jugador::class)->orderBy('apellido');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }
}
