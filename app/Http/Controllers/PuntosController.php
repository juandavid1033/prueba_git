<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Jugadores;
use App\Models\Partidos;
use App\Models\Puntos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jugadorMasPuntos = DB::table('puntos')
        ->select('jugadores.nombre_jugador', DB::raw('SUM(puntos.puntos) as total_puntos'))
        ->join('jugadores', 'puntos.id_jugador', '=', 'jugadores.id')
        ->join('partidos', 'puntos.id_partido', '=', 'partidos.id')
        ->join('campeonatos', 'partidos.id_campeonato', '=', 'campeonatos.id')
        ->groupBy('jugadores.nombre_jugador')
        ->orderByDesc('total_puntos')
        ->first();

    return view('puntos.index', ['jugadorMasPuntos' => $jugadorMasPuntos]);


}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $partidos = Partidos::all();

        $jugadores = Jugadores::all();

        return view('puntos.create', compact('partidos', 'jugadores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'puntos' => 'required|integer',
            'id_partido' => 'required',
            'id_jugador' => 'required',
        ]);

        // Crear una nueva instancia del modelo Registro
        $registro = new Puntos();
        $registro->puntos = $request->puntos;
        $registro->id_partido = $request->id_partido;
        $registro->id_jugador = $request->id_jugador;
        $registro->save();

        return redirect()->route('puntos.index')->with('success', 'Registro guardado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Puntos $puntos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puntos $puntos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puntos $puntos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puntos $puntos)
    {
        //
    }
}
