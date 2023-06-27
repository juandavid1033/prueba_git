@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jugador con más puntos</h1>

        @if ($jugadorMasPuntos)
            <p>El jugador con más puntos anotados en un partido es:</p>
            <p>Nombre: {{ $jugadorMasPuntos->nombre_jugador }}</p>
            <p>Puntos totales: {{ $jugadorMasPuntos->punto }}</p>
        @else
            <p>No hay información disponible</p>
        @endif
    </div>
@endsection
