@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jugador con más puntos</h1>

        @if ($jugadorMasPuntos)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">El jugador con más puntos anotados en el campeonato es:</h5>
                    <p class="card-text">Nombre: {{ $jugadorMasPuntos->nombre_jugador }}</p>
                    <p class="card-text">Puntos totales: {{ $jugadorMasPuntos->total_puntos }}</p>
                </div>
            </div>
        @else
            <p>No hay información disponible</p>
        @endif
    </div>
@endsection
