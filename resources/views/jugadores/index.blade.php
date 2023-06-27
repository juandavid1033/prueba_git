@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Jugadores</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Equipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $jugador)
                    <tr>
                        <td>{{ $jugador->nombre_jugador }}</td>
                        <td>{{ $jugador->equipo->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

