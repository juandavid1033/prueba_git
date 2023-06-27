<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;


    public function create()
    {
        $equipos = Equipos::all();

        return view('partidos.create', compact('equipos'));
    }

    public function jugadores()
    {
        return $this->hasMany(Jugadores::class, 'id_equipo');
    }
    public function partidos()
    {
        return $this->hasMany(Partidos::class, 'id_equipo');
    }
}

