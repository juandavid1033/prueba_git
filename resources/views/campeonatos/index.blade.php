@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>TORNEO</h1>

        @if ($campeon && $subcampeon)
            <h2>Equipo Campeón: {{ $campeon->nombre }}</h2>
            <p>Puntos: {{ $campeon->puntos }}</p>

            <h2>Equipo Subcampeón: {{ $subcampeon->nombre }}</h2>
            <p>Puntos: {{ $subcampeon->puntos }}</p>
        @else
            <p>No se ha definido un campeón y subcampeón</p>
        @endif
    </div>
@endsection
