<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_campeonato', 'id_equipo_local', 'id_equipo_visitante', 'goles_local', 'goles_visitante', 'fecha'
    ];

    public function equipoLocal()
    {
        return $this->belongsTo(Equipos::class, 'id_equipo_local');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipos::class, 'id_equipo_visitante');
    }

    public function getGanador()
    {
        if ($this->goles_local > $this->goles_visitante) {
            return $this->equipoLocal->nombre;
        } elseif ($this->goles_local < $this->goles_visitante) {
            return $this->equipoVisitante->nombre;
        } else {
            return 'Empate';
        }
    }

    public function getPuntosEquipoLocal()
    {
        if ($this->goles_local > $this->goles_visitante) {
            return 3; // Equipo local ganó
        } elseif ($this->goles_local === $this->goles_visitante) {
            return 1; // Empate
        } else {
            return 0; // Equipo local perdió
        }
    }

    public function getPuntosEquipoVisitante()
    {
        if ($this->goles_local < $this->goles_visitante) {
            return 3; // Equipo visitante ganó
        } elseif ($this->goles_local === $this->goles_visitante) {
            return 1; // Empate
        } else {
            return 0; // Equipo visitante perdió
        }
    }
    public function campeonato()
    {
        return $this->belongsTo(Campeonatos::class, 'id_campeonato');
    }
}
