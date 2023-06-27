<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Jugadores;
use Illuminate\Http\Request;
use iluminate\Support\Facades\storage;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos = Equipos::with('jugadores')->get();

        return view('equipos.index', compact('equipos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'max:2048'], // Max file size: 2MB
        ]);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
        }
        $equipo = new Equipos;
        $equipo->nombre = $validatedData['nombre'];
        $equipo->logo = $logoPath;
        $equipo->save();
        return redirect()->route('equipos.create')->with('success', 'Equipo registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipos $equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipos $equipos)
    {
        //
    }
}
