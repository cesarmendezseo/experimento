<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'year', 'cantidad_fechas'];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo');
    }
}
