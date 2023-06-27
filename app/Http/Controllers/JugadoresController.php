<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Jugadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $equipos = Equipos::with('jugadores')->get();
    $jugadores = Jugadores::all();

    return view('jugadores.index', compact('jugadores','equipos'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $equipos = Equipos::all();

        return view('jugadores.create', compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nombre_jugador' => ['required', 'string', 'max:255'],
            'id_equipo' => ['required', 'exists:equipos,id'],
        ]);

        Jugadores::create([
            'nombre_jugador' => $validatedData['nombre_jugador'],
            'id_equipo' => $validatedData['id_equipo'],
        ]);

        return redirect()->route('jugadores.index')->with('success', 'Jugador registrado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jugadores $jugadores)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jugadores $jugadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jugadores $jugadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jugadores $jugadores)
    {
        //
    }
}
