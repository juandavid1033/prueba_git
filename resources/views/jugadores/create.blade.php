@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Registro de Jugador</h2>
        <form method="POST" action="{{ route('jugadores.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre jugador:</label>
                <input type="text" name="nombre_jugador" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="equipo_id">Equipo:</label>
                <select name="id_equipo" id="equipo_id" class="form-control" required>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Jugador</button>
        </form>
    </div>
@endsection
