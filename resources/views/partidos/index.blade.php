@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Partidos Jugados</h1>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>campeonato</th>
                    <th>Fecha</th>
                    <th>Equipo Local</th>
                    <th>Goles Local</th>
                    <th>Equipo Visitante</th>
                    <th>Goles Visitante</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidos as $partido)
                    <tr>
                        <td>{{ $partido->campeonato->nombre }}</td>
                        <td>{{ $partido->fecha }}</td>
                        <td>{{ $partido->equipoLocal->nombre }}</td>
                        <td>{{ $partido->goles_local }}</td>
                        <td>{{ $partido->equipoVisitante->nombre }}</td>
                        <td>{{ $partido->goles_visitante }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('partidos.create') }}" class="btn btn-primary">Registrar Partido</a>
    </div>
@endsection
