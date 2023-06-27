<?php

namespace App\Http\Controllers;

use App\Models\campeonatos;
use App\Models\Equipos;
use App\Models\Partidos;
use Illuminate\Http\Request;

class PartidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $partido = Partidos::whereNotNull('goles_local')
            ->whereNotNull('goles_visitante')
            ->get();

        $partidos = Partidos::with('campeonato')->get();
    return view('partidos.index', compact('partidos','partido'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $campeonatos = campeonatos::all();
        $equipos = Equipos::all();

        return view('partidos.create', compact('campeonatos', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_campeonato' => 'required',
            'id_equipo_local' => 'required',
            'id_equipo_visitante' => 'required',
            'goles_local' => 'required|integer',
            'goles_visitante' => 'required|integer',
            'fecha' => 'required',
        ]);

        $partido = new Partidos();
        $partido->id_campeonato = $request->id_campeonato;
        $partido->id_equipo_local = $request->id_equipo_local;
        $partido->id_equipo_visitante = $request->id_equipo_visitante;
        $partido->goles_local = $request->goles_local;
        $partido->goles_visitante = $request->goles_visitante;
        $partido->fecha = $request->fecha;
        $partido->save();

        return redirect()->route('partidos.index')->with('success', 'Partido registrado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Partidos $partidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partidos $partidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partidos $partidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partidos $partidos)
    {
        //
    }
}
