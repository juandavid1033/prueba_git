<?php

namespace App\Http\Controllers;

use App\Models\campeonatos;
use App\Models\Equipos;
use App\Models\Partidos;
use Illuminate\Http\Request;

class CampeonatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos = Equipos::all();
        $partidosJugados = 5;

        $campeon = null;
        $subcampeon = null;

        foreach ($equipos as $equipo) {
            $puntos = 0;

            $partidos = Partidos::where(function ($query) use ($equipo) {
                $query->where('id_equipo_local', $equipo->id)
                      ->orWhere('id_equipo_visitante', $equipo->id);
            })->take($partidosJugados)->get();

            foreach ($partidos as $partido) {
                if ($partido->goles_local > $partido->goles_visitante) {
                    $puntos += 3;
                } elseif ($partido->goles_local === $partido->goles_visitante) {
                    $puntos += 1;
                }
            }

            $equipo->puntos = $puntos;

            if ($campeon === null || $equipo->puntos > $campeon->puntos) {
                $subcampeon = $campeon;
                $campeon = $equipo;
            } elseif ($subcampeon === null || $equipo->puntos > $subcampeon->puntos) {
                $subcampeon = $equipo;
            }

        return view('campeonatos.index', compact('campeon', 'subcampeon'));
    }


    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $equipos = Equipos::take(5)->get();
        return view('campeonatos.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date',
            'equipos' => 'required|array|min:5',
        ]);

        $campeonato = campeonatos::create([
            'nombre' => $request->nombre,
            'fecha_inicial' => $request->fecha_inicial,
            'fecha_final' => $request->fecha_final,
        ]);

        $campeonato->equipos()->attach($request->equipos);

        return redirect()->route('campeonatos.index')->with('success', 'Campeonato registrado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(campeonatos $campeonatos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(campeonatos $campeonatos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, campeonatos $campeonatos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(campeonatos $campeonatos)
    {
        //
    }
}
