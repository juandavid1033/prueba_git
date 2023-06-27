@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tabla de Estadísticas</h1>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Puntos</th>
                    <th>Goles Marcados</th>
                    <th>Goles en Contra</th>
                    <th>Partidos Empatados</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->nombre }}</td>
                        <td>{{ $equipo->puntos }}</td>
                        <td>{{ $equipo->golesMarcados }}</td>
                        <td>{{ $equipo->golesEnContra }}</td>
                        <td>{{ $equipo->partidosEmpatados }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
