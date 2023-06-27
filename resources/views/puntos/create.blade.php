@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registro de Puntos</h1>

        <form method="POST" action="{{ route('puntos.store') }}">
            @csrf

            <div class="form-group">
                <label for="puntos">Puntos:</label>
                <input type="number" class="form-control" id="puntos" name="puntos" required>
            </div>

            <div class="form-group">
                <label for="partido">Partido:</label>
                <select class="form-control" id="partido" name="id_partido" required>
                    <option value="">Seleccione un partido</option>
                    @foreach ($partidos as $partido)
                        <option value="{{ $partido->id }}">{{ $partido->created_at }}</option>
                    @endforeach
                </select>
            </div>



            <div class="form-group">
                <label for="jugador">Jugador:</label>
                <select class="form-control" id="jugador" name="id_jugador" required>
                    <option value="">Seleccione un jugador</option>
                    @foreach ($jugadores as $jugador)
                        <option value="{{ $jugador->id }}">{{ $jugador->nombre_jugador }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
