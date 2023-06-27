@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Equipos</h1>

        @foreach ($equipos as $equipo)
            <div class="card mb-3">
                <div class="card-header">
                    <h2>{{ $equipo->nombre }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $equipo->logo) }}" alt="Logo del equipo" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3>Jugadores</h3>
                            <ul class="list-group">
                                @foreach ($equipo->jugadores as $jugador)
                                    <li class="list-group-item">{{ $jugador->id }} - {{ $jugador->nombre_jugador }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

