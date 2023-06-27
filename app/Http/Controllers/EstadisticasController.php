<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\estadisticas;
use App\Models\Partidos;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos = Equipos::all();

        foreach ($equipos as $equipo) {
            $partidosJugados = Partidos::where('id_equipo_local', $equipo->id)
                                    ->orWhere('id_equipo_visitante', $equipo->id)
                                    ->get();

            $puntos = 0;
            $golesMarcados = 0;
            $golesEnContra = 0;
            $partidosEmpatados = 0;

            foreach ($partidosJugados as $partido) {
                if ($partido->goles_local > $partido->goles_visitante) {
                    if ($partido->id_equipo_local === $equipo->id) {
                        $puntos += 3;
                    }
                } elseif ($partido->goles_local < $partido->goles_visitante) {
                    if ($partido->id_equipo_visitante === $equipo->id) {
                        $puntos += 3;
                    }
                } else {
                    $puntos += 1;
                    $partidosEmpatados++;
                }

                if ($partido->id_equipo_local === $equipo->id) {
                    $golesMarcados += $partido->goles_local;
                    $golesEnContra += $partido->goles_visitante;
                } elseif ($partido->id_equipo_visitante === $equipo->id) {
                    $golesMarcados += $partido->goles_visitante;
                    $golesEnContra += $partido->goles_local;
                }
            }

            $equipo->puntos = $puntos;
            $equipo->golesMarcados = $golesMarcados;
            $equipo->golesEnContra = $golesEnContra;
            $equipo->partidosEmpatados = $partidosEmpatados;
        }

        $equipos = $equipos->sortByDesc('puntos');

        return view('estadisticas.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(estadisticas $estadisticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estadisticas $estadisticas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estadisticas $estadisticas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estadisticas $estadisticas)
    {
        //
    }
}
