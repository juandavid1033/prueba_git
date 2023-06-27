<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_jugador', 'id_equipo'];

    public function equipo()
    {
        return $this->belongsTo(Equipos::class, 'id_equipo');
    }
}

