<?php

namespace App\Http\Controllers;

use App\Models\Enfrentamiento;
use Illuminate\Http\Request;
use App\Models\Equipo;


class EnfrentamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $enfrentamientos = Enfrentamiento::with('equipoLocal', 'equipoVisitante')->get();

    return view('enfrentamientos.index', ['enfrentamientos' => $enfrentamientos]);
}


    /**
     * Show the form for creating a new resource.
     */
    /**
 * Show the form for creating a new resource.
 */
public function create()
{
    $equipos = Equipos::all(); // Asumiendo que tienes un modelo Equipo

    return view('enfrentamientos.create', compact('equipos'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equipo_local_id' => ['required', 'exists:equipos,id'],
            'equipo_visitante_id' => ['required', 'exists:equipos,id', 'different:equipo_local_id'],
            // Otros campos validados del enfrentamiento
        ]);

        Enfrentamiento::create($validatedData);

        return redirect()->route('enfrentamientos.index')->with('success', 'Enfrentamiento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enfrentamiento $enfrentamientos)
    {
        return view('enfrentamientos.show', compact('enfrentamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enfrentamiento $enfrentamientos)
    {
        return view('enfrentamientos.edit', compact('enfrentamiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enfrentamiento $enfrentamientos)
    {
        $validatedData = $request->validate([
            'equipo_local_id' => ['required', 'exists:equipos,id'],
            'equipo_visitante_id' => ['required', 'exists:equipos,id', 'different:equipo_local_id'],
            // Otros campos validados del enfrentamiento
        ]);

        $enfrentamientos->update($validatedData);

        return redirect()->route('enfrentamientos.index')->with('success', 'Enfrentamiento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enfrentamiento $enfrentamientos)
    {
        $enfrentamientos->delete();

        return redirect()->route('enfrentamientos.index')->with('success', 'Enfrentamiento eliminado exitosamente.');
    }
}
