<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campeonatos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha_inicial','fecha_final'];

    public function equipos()
    {
        return $this->belongsToMany(Equipos::class, 'detalle', 'id_campeonato', 'id_equipo');
    }
}
